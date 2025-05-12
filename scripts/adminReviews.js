$(document).ready(function() {
    
    $('#reviewButton').on('click', function(e) {
        e.preventDefault();
        $('.modalReview').toggleClass('is-visible');
        $('.modalReview-heading').text('Review');
      });
  
      $('.modal-toggle').on('click', function(e) {
          e.preventDefault();
          $('.modalReview').toggleClass('is-visible');
      });


    $(".dataSectionReviews").ready(function() {
      fetchComments();
    });


    $(document).on('click', '.reviewContainer', function() {
        var id = $(this).closest('.reviewContainer').data('name');

        $('.modalReview').toggleClass('is-visible');
  
        $.ajax({
          url: "../controllers/fetch.php",
          method: "GET",
          data: { 
            id: id,
            type: 'fetchComment'
          },
          success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
              console.log(data.content)
              $("#reviewRecipe").val(data.content['product_name']);
              $("#reviewAuthor").val(`${data.content['first_name']} ${data.content['last_name']} `);
              $("#reviewComment").val(data.content['comment']);
              $("#reviewPositive").val(data.content['positive']);
              $("#reviewNeutral").val(data.content['neutral']);
              $("#reviewNegative").val(data.content['negative']);
              $("#reviewSentiment").val(data.content['sentiment'].toUpperCase());
            } else {
              
            }
          },
          error: function() {
            alert("Something went wrong.");
          }
        });
  
      });


    $('.filterLogField').change(function() {
  
        const name = $('#filterName').val();
        const recipe = $('#filterRecipe').val();
        const rating = $('#filterRating').val();
        const sentiment = $('#filterSentiment').val();
        
        fetchComments(name, recipe, rating, sentiment);
  
      });
  
      $('.filterLogFieldInput').on("input", function() {
  
        const name = $('#filterName').val();
        const recipe = $('#filterRecipe').val();
        const rating = $('#filterRating').val();
        const sentiment = $('#filterSentiment').val();
        
        fetchComments(name, recipe, rating, sentiment);
  
      });

    function fetchComments(name=null, recipe=null, rating=null, sentiment=null) {

      const startDate = document.getElementById('filterStartDate').value;
      const startTime = document.getElementById('filterStartTime').value;
      const endDate = document.getElementById('filterEndDate').value;
      const endTime = document.getElementById('filterEndTime').value;

      console.log(recipe)

      $.ajax({
        url: "../controllers/fetch.php",
        method: "GET",
        data: { 
          filterName: name,
          filterRecipe: recipe,
          filterRating: rating,
          filterSentiment: sentiment,
          filterStartDate: startDate,
          filterStartTime: startTime,
          filterEndDate: endDate,
          filterEndTime: endTime,
          type: 'fetchComments'
        },
        success: function(response) {
          const data = JSON.parse(response);
          if (data.success) {
            $(".dataSectionReviews").empty();
            $(".dataSectionReviews").html(data.content);
          } else {
            
          }
        },
        error: function() {
          alert("Something went wrong.");
        }
      });
    }
});