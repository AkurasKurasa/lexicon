<form id="editProfileForm" enctype="multipart/form-data" method="POST">
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div class="change-picture">
        <div class="image-container">
            <input id="imageInput" type="file" class="file" style="display: none;"name="imagefile" accept=".jpg, .jpeg, .png"/>
            <img src="" class="user-image" id="userImage">
            <img src="../assets/images/edit-icon.png" class="edit-icon">
        </div>
        <h2 class="picture-label"> Change your profile picture </h2>
    </div>

    <div style="display: flex; flex-direction: column; justify-content: center;">
            <div class="wrapper">
                <div class="fieldsContainer">
                        <label for="name">First Name</label>
                        <input class="name "type="text" name="first-name" placeholder="e.g. John">
                    </div>
                <div class="fieldsContainer">
                    <label for="name">Last Name</label>
                    <input class="name" type="text" name="last-name" placeholder="e.g. Dela Cruz">
                </div>
            </div>

            <div class="fieldsContainer">
                    <label for="email">Email</label>
                    <input type="email" name="email-address" placeholder="hello123@gmail.com">
            </div>
            <div class="fieldsContainer">
                    <label for="occupation">Occupation</label>
                    <input type="text" name="occupation" placeholder="Occupation">
            </div>

            <div class="wrapper">
                <div class="fieldsContainer">
                    <label for="gender_field">Gender</label>
                    <select class="gender" name="gender" id="genderSelect">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="fieldsContainer">
                        <label for="phoneNo">Date of Birth</label>
                        <input class="name" type="date" name="birthday">
                    </div>
            </div>

            <div class="fieldsContainer">
                        <label for="phoneNo">About You (Maximum of 50 words)</label>
                        <textarea class="description" name="description"></textarea>
            </div>
        <div style="display:flex; justify-content:center;"><button type="submit">Confirm Changes</button></div>
    </div>   
</div>
</form>