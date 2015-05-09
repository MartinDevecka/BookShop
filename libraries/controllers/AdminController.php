<?php

session_start();

class AdminController extends Controller {

    public function actionAddBook() {             
       
        $categories = Admin::categorySelectCombo();
        $select_category = '<select name="category">';
        foreach ($categories as $category) {
            $select_category .= '<option value="' . $category['id_category'] . '">' . $category['category_name'] . '</option>';
        }
        $select_category .= '</select>';

        $authors = Admin::authorSelectCombo();
        $select_author = '<select name="author">';
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
            Admin::bookAdd($_POST);  
            $datapost['success'] = 'Add book success...';
            $this->render('adminAddBook', $datapost, 'register');
        } else {
            $datapost['error'] = 'Add book failed...';
            $this->render('adminAddBook', $datapost, 'register');  
        }
    }
    
     public function actionEditBook() {             
       
        $book_select = Admin::bookSelect();               

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete Book';
        $datapost['book_select'] = $book_select;
         
        
        if (!empty($_POST['ci'])) {      
            Admin::bookEdit($_POST);  
            $datapost['success'] = 'Edit book success...';
            $this->render('adminEditBook', $datapost, 'register');
        } else {
            $datapost['error'] = 'Edit book failed...';
            $this->render('adminEditBook', $datapost, 'register');  
        }
              
    }
}
?>

