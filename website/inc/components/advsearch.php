<div class="jumbotron jumbotron-fluid">
  <div class="container">

    <h1 class="display-4">Nova Scotia Legal News | Advanced Search</h1>
    <p class="lead">A place to find and comment on the latest rulings, legislation and other legal affairs in Nova Scotia</p>

    <?php
    /* 
     * Title: W3Schools HTML Input Types
     * URL: https://www.w3schools.com/html/html_form_input_types.asp
     * Date Accessed: 27 Nov 2021
     * Purpose: Reviewed use of different types of input to generate an advanced search interface
     *
     * Title: Forms Bootstrap
     * URL: https://getbootstrap.com/docs/4.1/components/forms/#checkboxes-and-radios
     * Date Accessed: 27 Nov 2021
     * Purpose: Referred to existing Bootstrap framework styling mechanisms for radio type inputs
     */
    ?>
    <form method="GET" action="searchresults.php" id="search-form">
        <div class="input-group input-group-lg">
            <input type="text" name="search-text" class="form-control" placeholder="Search">
            <label for="search-text" hidden>Search terms:</label>
            <div class="input-group-btn">
              <button class="btn btn-info btn-lg" type="submit"><i class="bi-search" style="font-size: 1.5rem;"></i>
            </div>
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="search-by" id="articleHeadline" value="articleHeadline" checked>
            <label class="form-check-label" for="articleHeadline">Search by Article Title</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="search-by" id="authorName" value="authorName">
            <label class="form-check-label" for="authorName">Search by Author Name</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="search-by" id="articleText" value="articleText">
            <label class="form-check-label" for="articleText">Search by Article Content</label>
        </div>
        <br>
    </form>
    <br>
    
  </div>
</div>