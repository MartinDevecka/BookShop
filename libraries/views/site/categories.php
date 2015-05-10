<p id="searchCategory" class="hidden" ><?= $category = $data['category'] != NULL ? $data['category']: 'allbooks'; ?></p>
<?php
if(!($category == 'allbooks'))
{
    $categoryList = '<div id="categoriesList" class="btn-group col-lg-4 col-lg-offset-4" role="group" aria-label="...">
            <a href="' . $this->app->getBaseUrl() . 'book/showbooks?category=fantasy#showRedirect" class="btn btn-info categoryListItem" role="button">Fantasy</a>
            <a href="' . $this->app->getBaseUrl() . 'book/showbooks?category=sci-fi#showRedirect" class="btn btn-info categoryListItem" role="button">Sci-fi</a>
            <a href="' . $this->app->getBaseUrl() . 'book/showbooks?category=novels#showRedirect" class="btn btn-info categoryListItem" role="button">Novels</a>
            <a href="' . $this->app->getBaseUrl() . 'book/showbooks?category=bestsellers#showRedirect" class="btn btn-info categoryListItem" role="button">Bestsellers</a>
        </div>';
    echo $categoryList;
}
?>

<script type="text/javascript">
    
    $('#categoriesList a').each(function(){
        if($(this).hasClass('active'))
            $(this).removeClass('active');
        if(($(this).text().toLowerCase()) === $('#searchCategory').text())
            $(this).addClass('active');
    });
    
</script>