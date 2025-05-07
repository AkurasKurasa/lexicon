<div style="display:flex; flex-direction: column; justify-content: center; margin-top:60px; gap:1.5rem;">
    <!-- Form for changing password -->
    <label class="section-label">Password Settings</label>
    <form id="changePasswordForm">
        <div class="fieldsContainer">
            <label for="currentpassword">Current Password</label>
            <input type="password" id="currentPassword" name="currentpassword" placeholder="Current Password" autocomplete="current-password">
        </div>
        <div class="fieldsContainer">
            <label for="newpassword">New Password</label>
            <input type="password" id="newPassword" name="newpassword" placeholder="New Password" autocomplete="new-password">
        </div>
        <div class="fieldsContainer">
            <label for="confirmnewpassword">Confirm New Password</label>
            <input type="password" id="confirmnewpassword" name="confirmnewpassword" placeholder="Confirm New Password" autocomplete="new-password">
        </div>
        <div style="display:flex; justify-content:center;">
            <button type="submit">Change Password</button>
        </div>
    </form>

    <!-- Form for security questions -->
     <label class="section-label">Security Questions</label>
    <form id="securityForm">
        <div>
            <div class="wrapper">
                <div class="fieldsContainer">
                    <label for="petname">What was the name of your first pet?</label>
                    <input class="name" id="petname" type="text" name="petname" placeholder="Answer">
                </div>
                <div class="fieldsContainer">
                    <label for="schoolname">What was the name of your elementary school?</label>
                    <input class="name" id="schoolname" type="text" name="schoolname" placeholder="Answer">
                </div>
            </div>

            <div class="wrapper">
                <div class="fieldsContainer">
                    <label for="nickname">What was your childhood nickname?</label>
                    <input class="name" id="nickname" type="text" name="nickname" placeholder="Answer">
                </div>
                <div class="fieldsContainer">
                    <label for="cartoon">Who was your favorite cartoon character as a child?</label>
                    <input class="name" id="cartoon" type="text" name="cartoon" placeholder="Answer">
                </div>
            </div>

            <div class="wrapper">
                <div class="fieldsContainer">
                    <label for="streetname">What is the name of the street you grew up on?</label>
                    <input class="name" id="streetname" type="text" name="streetname" placeholder="Answer">
                </div>
                <div class="fieldsContainer">
                    <label for="favoritesweet">What was your favorite sweet to eat as a child?</label>
                    <input class="name" id="favoritesweet" type="text" name="favoritesweet" placeholder="Answer">
                </div>
            </div>

            <div style="display:flex; justify-content:center;">
                <button id="confirmSecurity" type="submit">Confirm Answer </button>
            </div>
        </div>
    </form> 
</div>
