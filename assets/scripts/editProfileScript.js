$(document).ready(function () {
    $(".main-content").load("changeInfo.php", function (response, status, xhr) {
        if (status === "error") {
            console.error("Failed to load:", xhr.status, xhr.statusText);
        } else {
            console.log("changeInfo.php loaded successfully");
        }
        //loads the current info
        loadCurrentInfo()
    });
    
    $(".main-content").on("click", ".image-container", function (e) {        
        $(this).find('input[type="file"]').click();
        
        console.log("Image container clicked");
    });
    
    $(".main-content").on("click", "input[type='file']", function (e) {
        e.stopPropagation();
    });

    $(".main-content").on("change", "input[type='file']", function (e) {
        var myFile = $(this).prop('files')[0];
        if (!(/image/i).test(myFile.type)) {
            alert("File " + file.name + " is not an image.");
        }

        else {
            var imageURL = URL.createObjectURL(myFile);
            $("#userImage").attr('src', imageURL); // update the preview
        }
        /*
        if (myFile) {
            //Compresses and Resizes the uploaded image to ensure that the image can be stored in the database
            processfile(myFile, function (resizedBlob) {
                console.log("Resized image ready:", resizedBlob);
                var blobURL = URL.createObjectURL(resizedBlob);
                $("#userImage").attr('src', blobURL); // update the preview
            });
        }*/
    });

    $(".main-content").on("submit", "#editProfileForm", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '../controllers/profileProcess.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $data = JSON.parse(response);
                if($data.success) {
                    alert('EDIT SUCCESSFUL!');
                }
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error("Error saving profile:", error);
            }
        });
    });
    
    
    

    $(".tabs").on("click", ".tab", function () {
        $(".tab").removeClass("selected");
        $(this).addClass("selected");
    });

    $("#editPassword").on("click", function () {
        $(".main-content").load("passandsecurity.php");
    });

    $("#editProfile").on("click", function () {
        $(".main-content").load("changeInfo.php");
        loadCurrentInfo();
    });
});

function loadCurrentInfo() {
    $.ajax({
        url: '../controllers/profileProcess.php',
        type: 'GET',
        success: function(response){
            const data = JSON.parse(response); // Parse JSON response
            $("input[name='first-name']").val(data.first_name);
            $("input[name='last-name']").val(data.last_name);
            $("input[name='email-address']").val(data.email);
            $("input[name='birthday']").val(data.birthday?.split(" ")[0]);
            $("select[name='gender']").val(data.gender);
            $("textarea[name='description']").val(data.description); 
            if (data.profile_picture_url) {
                $("#userImage").attr('src', data.profile_picture_url);
                console.log(data.birthday);
            }
            else {
                $("#userImage").attr('src', '../assets/images/img_avatar.png');
            }
            if (data.birthday) {
                $("input[name='birthday']").attr('disabled', true);
            }
            
        }
    });
}

/*
// === RESIZE ====
function processfile(file, callback) {
    if (!(/image/i).test(file.type)) {
        alert("File " + file.name + " is not an image.");
        return;
    }

    var reader = new FileReader();
    reader.readAsArrayBuffer(file);

    reader.onload = function (event) {
        var blob = new Blob([event.target.result]);
        var blobURL = URL.createObjectURL(blob);
        var image = new Image();
        image.src = blobURL;

        image.onload = function () {
            resizeMe(image, callback); // pass callback down
        };
    };
};



// === RESIZE ====

function resizeMe(img, callback) {
    var canvas = document.createElement('canvas');

    var width = img.width;
    var height = img.height;
    var max_height = 400;
    var max_width = 400;

    if (width > height) {
        if (width > max_width) {
            height = Math.round(height *= max_width / width);
            width = max_width;
        }
    } else {
        if (height > max_height) {
            width = Math.round(width *= max_height / height);
            height = max_height;
        }
    }

    canvas.width = width;
    canvas.height = height;
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0, width, height);

    canvas.toBlob(function(blob) {
        if (callback) callback(blob);
    }, "image/jpeg", 0.7);
}
*/