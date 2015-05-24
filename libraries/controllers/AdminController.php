<?php

session_start();

class AdminController extends Controller {
    
    /*
     * **************************************************************************************************************
     * ADMIN
     * **************************************************************************************************************
     */

    public function actionLoginAdmin() {

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Login';

        if (!empty($_POST)) {
            if (!empty($email) && !empty($password)) {
                if (Helpers::isValidEmail($email) && Helpers::isValidPassword($password)) {
                    if (Admin::verifyAdminLogin($_POST)) {
                        $_SESSION['admin'] = 1;
                        $datapost['success'] = 'Login successful, redirecting to the admin page... ';
                        $this->render('adminLogoutForm', $datapost, 'admin');
                    } else {
                        $datapost['error'] = 'E-mail or password non valid, please try again.';
                        $this->render('adminLoginForm', $datapost, 'admin');
                    }
                } else {
                    $datapost['error'] = 'Non valid format. E-mail (numbers allowed) example: my.2email@gmail.com Password (min 5 characters, min one big letter, special character, number) example: Pas&1';
                    $this->render('adminLoginForm', $datapost, 'admin');
                }
            } else {
                $datapost['error'] = 'E-mail and password has to be filled.';
                $this->render('adminLoginForm', $datapost, 'admin');
            }
        } else {
            $datapost['success'] = 'Feel free to login.';
            $this->render('adminLoginForm', $datapost, 'admin');
        }
    }

    public function actionLogoutAdmin() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Login';

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
            $datapost['success'] = 'Logout successful, redirecting to the login form...';
            $this->render('adminLoginForm', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Please log in, redirecting to the login form...';
            $this->render('adminLoginForm', $datapost, 'admin');
        }
    }

    /*
     * **************************************************************************************************************
     * BOOK
     * **************************************************************************************************************
     */

    public function actionAddBook() {

        $categories = Category::categorySelectCombo();
        $select_category = '<select name="id_category">';
        foreach ($categories as $category) {
            $select_category .= '<option value="' . $category['id_category'] . '">' . $category['category_name'] . '</option>';
        }
        $select_category .= '</select>';

        $authors = Author::authorSelectCombo();
        $select_author = '<select name="id_author">';
        foreach ($authors as $author) {
            $select_author .= '<option value="' . $author['id_author'] . '">' . $author['author_name'] . '</option>';
        }
        $select_author .= '</select>';

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add Book';
        $datapost['categories'] = $select_category;
        $datapost['authors'] = $select_author;

        if (!empty($_POST)) {          
            Book::bookAdd($_POST);
            $book_select_all = Book::bookSelectAll();
            $datapost['book_select_all'] = $book_select_all;
            $datapost['success'] = 'Book was added successfuly, redirecting to books search results...';
            $this->render('adminSearchBook', $datapost, 'admin');                             
        } else {
            $datapost['success'] = 'Add book here or try insert via database...';
            $this->render('adminAddBook', $datapost, 'admin');
        }
    }

    public function actionFindBook() {

        $book_select_all = Book::bookSelectAll();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Books for Edit/Delete';
        $datapost['book_select_all'] = $book_select_all;

        if (!empty($_GET)) {
            $datapost['success'] = 'Book search results...';
            $this->render('adminSearchBook', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Books search failed, add some into database...';
            $this->actionAddBook();
        }
    }

    public function actionEditBook() {

        $categories = Category::categorySelectCombo();
        $authors = Author::authorSelectCombo();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Book';
        $datapost['book'] = '';

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = Book::bookSelect($route[2])) {

                $select_category = '<select name="id_category">';
                foreach ($categories as $category) {
                    $select_category .= '<option ' . ($category['id_category'] === $result[0]['id_category'] ? ' selected="selected"' : '') . ' value="' . $category['id_category'] . '">' . $category['category_name'] . '</option>';
                }
                $select_category .= '</select>';
                $datapost['categories'] = $select_category;

                $select_author = '<select name="id_author">';
                foreach ($authors as $author) {
                    $select_author .= '<option ' . ($author['id_author'] === $result[0]['id_author'] ? ' selected="selected"' : '') . ' value="' . $author['id_author'] . '">' . $author['author_name'] . '</option>';
                }
                $select_author .= '</select>';
                $datapost['authors'] = $select_author;

                $datapost['book'] = $result[0];
                $datapost['success'] = 'Redirecting to book edit form... ';
                $this->render('adminEditBook', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Edit error...';
                $this->render('adminSearchBook', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Edit error...';
            $this->render('adminSearchBook', $datapost, 'admin');
        }
    }

    public function actionSaveBook() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Book';

        if (!empty($_POST)) {
            Book::bookEdit($_POST);
            $book_select_all = Book::bookSelectAll();
            $datapost['book_select_all'] = $book_select_all;
            $datapost['success'] = 'Book was saved successfuly, redirecting to books search results...';
            $this->render('adminSearchBook', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Book was not saved...';
            $this->render('adminSearchBook', $datapost, 'admin');
        }
    }

    public function actionDeleteBook() {
        
        $book_select_all = Book::bookSelectAll();
     
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete Book';
        $datapost['book_select_all'] = $book_select_all;

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if (Book::bookDelete($route[2])) {
                $book_select_all = Book::bookSelectAll();
                $datapost['book_select_all'] = $book_select_all;
                $datapost['success'] = 'Book was deleted successfuly, redirecting to books search results...';
                $this->render('adminSearchBook', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Book delete failed...';
                $this->render('adminSearchBook', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Book delete failed...';
            $this->render('adminSearchBook', $datapost, 'admin');
        }
    }
    
    /*
     * **************************************************************************************************************
     * CATEGORY
     * **************************************************************************************************************
     */

    public function actionAddCategory() {     

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add Category';      

        if (!empty($_POST)) {          
            Category::categoryAdd($_POST);
            $category_select_all = Category::categorySelectAll();
            $datapost['category_select_all'] = $category_select_all;
            $datapost['success'] = 'Category was added successfuly, redirecting to categories search results...';
            $this->render('adminSearchCategory', $datapost, 'admin');                             
        } else {
            $datapost['success'] = 'Add category here or try insert via database...';
            $this->render('adminAddCategory', $datapost, 'admin');
        }
    }

    public function actionFindCategory() {

        $category_select_all = Category::categorySelectAll();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Categories for Edit/Delete';
        $datapost['category_select_all'] = $category_select_all;

        if (!empty($_GET)) {
            $datapost['success'] = 'Category search results...';
            $this->render('adminSearchCategory', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Categories search failed, add some into database...';
            $this->actionAddCategory();
        }
    }

    public function actionEditCategory() {       

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Category';
        $datapost['category'] = '';

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = Category::categorySelect($route[2])) {
                $datapost['category'] = $result[0];
                $datapost['success'] = 'Redirecting to category edit form... ';
                $this->render('adminEditCategory', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Edit error...';
                $this->render('adminSearchCategory', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Edit error...';
            $this->render('adminSearchCategory', $datapost, 'admin');
        }
    }

    public function actionSaveCategory() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Category';

        if (!empty($_POST)) {
            Category::categoryEdit($_POST);
            $category_select_all = Category::categorySelectAll();
            $datapost['category_select_all'] = $category_select_all;
            $datapost['success'] = 'Category was saved successfuly, redirecting to categories search results...';
            $this->render('adminSearchCategory', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Category was not saved...';
            $this->render('adminSearchCategory', $datapost, 'admin');
        }
    }

    public function actionDeleteCategory() {
        
        $category_select_all = Category::categorySelectAll();
     
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete Category';
        $datapost['category_select_all'] = $category_select_all;

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if (Category::categoryDelete($route[2])) {
                $category_select_all = Category::categorySelectAll();
                $datapost['category_select_all'] = $category_select_all;
                $datapost['success'] = 'Category was deleted successfuly, redirecting to categories search results...';
                $this->render('adminSearchCategory', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Category delete failed, books already assigned to category...';
                $this->render('adminSearchCategory', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Category delete failed, books already assigned to category...';
            $this->render('adminSearchCategory', $datapost, 'admin');
        }
    }
    
     /*
     * **************************************************************************************************************
     * AUTHOR
     * **************************************************************************************************************
     */

    public function actionAddAuthor() {     

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add Author';      

        if (!empty($_POST)) {          
            Author::authorAdd($_POST);
            $author_select_all = Author::authorSelectAll();
            $datapost['author_select_all'] = $author_select_all;
            $datapost['success'] = 'Author was added successfuly, redirecting to authors search results...';
            $this->render('adminSearchAuthor', $datapost, 'admin');                             
        } else {
            $datapost['success'] = 'Add author here or try insert via database...';
            $this->render('adminAddAuthor', $datapost, 'admin');
        }
    }

    public function actionFindAuthor() {

        $author_select_all = Author::authorSelectAll();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Authors for Edit/Delete';
        $datapost['author_select_all'] = $author_select_all;

        if (!empty($_GET)) {
            $datapost['success'] = 'Author search results...';
            $this->render('adminSearchAuthor', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Authors search failed, add some into database...';
            $this->actionAddAuthor();
        }
    }

    public function actionEditAuthor() {       

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Author';
        $datapost['author'] = '';

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = Author::authorSelect($route[2])) {
                $datapost['author'] = $result[0];
                $datapost['success'] = 'Redirecting to author edit form... ';
                $this->render('adminEditAuthor', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Edit error...';
                $this->render('adminSearchAuthor', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Edit error...';
            $this->render('adminSearchAuthor', $datapost, 'admin');
        }
    }

    public function actionSaveAuthor() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Author';

        if (!empty($_POST)) {
            Author::authorEdit($_POST);
            $author_select_all = Author::authorSelectAll();
            $datapost['author_select_all'] = $author_select_all;
            $datapost['success'] = 'Author was saved successfuly, redirecting to authors search results...';
            $this->render('adminSearchAuthor', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Author was not saved...';
            $this->render('adminSearchAuthor', $datapost, 'admin');
        }
    }

    public function actionDeleteAuthor() {
        
        $author_select_all = Author::authorSelectAll();
     
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete Author';
        $datapost['author_select_all'] = $author_select_all;

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if (Author::authorDelete($route[2])) {
                $author_select_all = Author::authorSelectAll();
                $datapost['author_select_all'] = $author_select_all;
                $datapost['success'] = 'Author was deleted successfuly, redirecting to authors search results...';
                $this->render('adminSearchAuthor', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Author delete failed, books already assigned to author...';
                $this->render('adminSearchAuthor', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Author delete failed, books already assigned to author...';
            $this->render('adminSearchAuthor', $datapost, 'admin');
        }
    }
    
    /*
     * **************************************************************************************************************
     * USER
     * **************************************************************************************************************
     */

    public function actionAddUser() {  
        
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add User';      

        if (!empty($_POST)) {          
            User::userAdd($_POST);
            $user_select_all = User::userSelectAll();
            $datapost['user_select_all'] = $user_select_all;
            $datapost['success'] = 'User was added successfuly, redirecting to users search results...';
            $this->render('adminSearchUser', $datapost, 'admin');                             
        } else {
            $datapost['success'] = 'Add user here or try insert via database...';
            $this->render('adminAddUser', $datapost, 'admin');
        }
    }

    public function actionFindUser() {

        $user_select_all = User::userSelectAll();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Users for Edit/Delete';
        $datapost['user_select_all'] = $user_select_all;

        if (!empty($_GET)) {
            $datapost['success'] = 'User search results...';
            $this->render('adminSearchUser', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Users search failed, add some into database...';
            $this->actionAddUser();
        }
    }

    public function actionEditUser() {       

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit User';
        $datapost['user'] = '';

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = User::userSelect($route[2])) {
                $datapost['user'] = $result[0];
                $datapost['success'] = 'Redirecting to user edit form... ';
                $this->render('adminEditUser', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Edit error...';
                $this->render('adminSearchUser', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Edit error...';
            $this->render('adminSearchUser', $datapost, 'admin');
        }
    }

    public function actionSaveUser() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit User';

        if (!empty($_POST)) {
            User::userEdit($_POST);
            $user_select_all = User::userSelectAll();
            $datapost['user_select_all'] = $user_select_all;
            $datapost['success'] = 'User was saved successfuly, redirecting to users search results...';
            $this->render('adminSearchUser', $datapost, 'admin');
        } else {
            $datapost['error'] = 'User was not saved...';
            $this->render('adminSearchUser', $datapost, 'admin');
        }
    }

    public function actionDeleteUser() {
        
        $user_select_all = User::userSelectAll();
     
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete User';
        $datapost['user_select_all'] = $user_select_all;

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if (User::userDelete($route[2])) {
                $user_select_all = User::userSelectAll();
                $datapost['user_select_all'] = $user_select_all;
                $datapost['success'] = 'User was deleted successfuly, redirecting to users search results...';
                $this->render('adminSearchUser', $datapost, 'admin');
            } else {
                $datapost['error'] = 'User delete failed...';
                $this->render('adminSearchUser', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'User delete failed...';
            $this->render('adminSearchUser', $datapost, 'admin');
        }
    }
    
    /*
     * **************************************************************************************************************
     * ORDER
     * **************************************************************************************************************
     */

    public function actionAddOrder() {

        $users = User::userSelectCombo();
        $select_user = '<select name="id_user">';
        foreach ($users as $user) {
            $select_user .= '<option value="' . $user['id_user'] . '">' . $user['user_email'] . '</option>';
        }
        $select_user .= '</select>';    

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add Order';
        $datapost['users'] = $select_user;       

        if (!empty($_POST)) {          
            Order::orderAdd($_POST);
            $order_select_all = Order::orderSelectAll();
            $datapost['order_select_all'] = $order_select_all;
            $datapost['success'] = 'Order was added successfuly, redirecting to orders search results...';
            $this->render('adminSearchOrder', $datapost, 'admin');                             
        } else {
            $datapost['success'] = 'Add order here or try insert via database...';
            $this->render('adminAddOrder', $datapost, 'admin');
        }
    }

    public function actionFindOrder() {

        $order_select_all = Order::orderSelectAll();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Orders for Edit/Delete';
        $datapost['order_select_all'] = $order_select_all;

        if (!empty($_GET)) {
            $datapost['success'] = 'Order search results...';
            $this->render('adminSearchOrder', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Orders search failed, add some into database...';
            $this->actionAddOrder();
        }
    }

    public function actionEditOrder() {

        $users = User::userSelectCombo();       

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Order';
        $datapost['order'] = '';

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = Order::orderSelect($route[2])) {

                $select_user = '<select name="id_user">';
                foreach ($users as $user) {
                    $select_user .= '<option ' . ($user['id_user'] === $result[0]['id_user'] ? ' selected="selected"' : '') . ' value="' . $user['id_user'] . '">' . $user['user_email'] . '</option>';
                }
                $select_user .= '</select>';
                $datapost['users'] = $select_user;             

                $datapost['order'] = $result[0];
                $datapost['success'] = 'Redirecting to order edit form... ';
                $this->render('adminEditOrder', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Edit error...';
                $this->render('adminSearchOrder', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Edit error...';
            $this->render('adminSearchOrder', $datapost, 'admin');
        }
    }

    public function actionSaveOrder() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Order';

        if (!empty($_POST)) {          
            Order::orderEdit($_POST);
            $order_select_all = Order::orderSelectAll();
            $datapost['order_select_all'] = $order_select_all;
            $datapost['success'] = 'Order was saved successfuly, redirecting to orders search results...';
            $this->render('adminSearchOrder', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Order was not saved...';
            $this->render('adminSearchOrder', $datapost, 'admin');
        }
    }

    public function actionDeleteOrder() {
        
        $order_select_all = Order::orderSelectAll();
     
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete Order';
        $datapost['order_select_all'] = $order_select_all;

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if (Order::orderDelete($route[2])) {
                $order_select_all = Order::orderSelectAll();
                $datapost['order_select_all'] = $order_select_all;
                $datapost['success'] = 'Order was deleted successfuly, redirecting to orders search results...';
                $this->render('adminSearchOrder', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Order delete failed...';
                $this->render('adminSearchOrder', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Order delete failed...';
            $this->render('adminSearchOrder', $datapost, 'admin');
        }
    }     
    
    /*
     * **************************************************************************************************************
     * REVIEW
     * **************************************************************************************************************
     */

    public function actionAddReview() {

        $users = User::userSelectCombo();
        $select_user = '<select name="id_user">';
        foreach ($users as $user) {
            $select_user .= '<option value="' . $user['id_user'] . '">' . $user['user_email'] . '</option>';
        }
        $select_user .= '</select>';    
        
        $books = Book::bookSelectCombo();
        $select_book = '<select name="id_book">';
        foreach ($books as $book) {
            $select_book .= '<option value="' . $book['id_book'] . '">' . $book['book_title'] . '</option>';
        }
        $select_book .= '</select>';  

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add Review';
        $datapost['users'] = $select_user;   
        $datapost['books'] = $select_book; 

        if (!empty($_POST)) {          
            Review::reviewAdd($_POST);
            $review_select_all = Review::reviewSelectAll();
            $datapost['review_select_all'] = $review_select_all;
            $datapost['success'] = 'Review was added successfuly, redirecting to reviews search results...';
            $this->render('adminSearchReview', $datapost, 'admin');                             
        } else {
            $datapost['success'] = 'Add review here or try insert via database...';
            $this->render('adminAddReview', $datapost, 'admin');
        }
    }

    public function actionFindReview() {

        $review_select_all = Review::reviewSelectAll();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Reviews for Edit/Delete';
        $datapost['review_select_all'] = $review_select_all;

        if (!empty($_GET)) {
            $datapost['success'] = 'Review search results...';
            $this->render('adminSearchReview', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Reviews search failed, add some into database...';
            $this->actionAddReview();
        }
    }

    public function actionEditReview() {

        $users = User::userSelectCombo(); 
        $books = Book::bookSelectCombo();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Review';
        $datapost['review'] = '';

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = Review::reviewSelect($route[2])) {
                         
                $select_book = '<select name="id_book">';
                foreach ($books as $book) {
                    $select_book .= '<option ' . ($book['id_book'] === $result[0]['id_book'] ? ' selected="selected"' : '') . ' value="' . $book['id_book'] . '">' . $book['book_title'] . '</option>';
                }
                $select_book .= '</select>';
                $datapost['books'] = $select_book; 
                
                $select_user = '<select name="id_user">';
                foreach ($users as $user) {
                    $select_user .= '<option ' . ($user['id_user'] === $result[0]['id_user'] ? ' selected="selected"' : '') . ' value="' . $user['id_user'] . '">' . $user['user_email'] . '</option>';
                }
                $select_user .= '</select>';
                $datapost['users'] = $select_user;  

                $datapost['review'] = $result[0];
                $datapost['success'] = 'Redirecting to review edit form... ';
                $this->render('adminEditReview', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Edit error...';
                $this->render('adminSearchReview', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Edit error...';
            $this->render('adminSearchReview', $datapost, 'admin');
        }
    }

    public function actionSaveReview() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Review';

        if (!empty($_POST)) {          
            Review::reviewEdit($_POST);
            $review_select_all = Review::reviewSelectAll();
            $datapost['review_select_all'] = $review_select_all;
            $datapost['success'] = 'Review was saved successfuly, redirecting to reviews search results...';
            $this->render('adminSearchReview', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Review was not saved...';
            $this->render('adminSearchReview', $datapost, 'admin');
        }
    }

    public function actionDeleteReview() {
        
        $review_select_all = Review::reviewSelectAll();
     
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete Review';
        $datapost['review_select_all'] = $review_select_all;

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if (Review::reviewDelete($route[2])) {
                $review_select_all = Review::reviewSelectAll();
                $datapost['review_select_all'] = $review_select_all;
                $datapost['success'] = 'Review was deleted successfuly, redirecting to reviews search results...';
                $this->render('adminSearchReview', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Review delete failed...';
                $this->render('adminSearchReview', $datapost, 'admin');
            }
        } else {
            $datapost['error'] = 'Review delete failed...';
            $this->render('adminSearchReview', $datapost, 'admin');
        }
    }
}
?>

