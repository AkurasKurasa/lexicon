$(document).ready(function() {
    // AdminLogs.php

    $(".dataSectionReviews").ready(function() {
      fetchComments();
    });

    $('.filterLogField').change(function() {

      const name = $('#filterName').val();
      const role = $('#filterLogsCategory').val();
      
      fetchLogs(name, role);

    });

    $('.filterLogFieldInput').on("input", function() {

      const name = $('#filterName').val();
      const role = $('#filterLogsCategory').val();
      
      fetchLogs(name, role);

    });

    function fetchComments(name=null, role=null) {

    //   const startDate = document.getElementById('filterLogStartDate').value;
    //   const startTime = document.getElementById('filterLogStartTime').value;
    //   const endDate = document.getElementById('filterLogEndDate').value;
    //   const endTime = document.getElementById('filterLogEndTime').value;

      $.ajax({
        url: "../controllers/fetch.php",
        method: "GET",
        data: { 
        //   filterName: name,
        //   filterRole: role,
        //   filterStartDate: startDate,
        //   filterStartTime: startTime,
        //   filterEndDate: endDate,
        //   filterEndTime: endTime,
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