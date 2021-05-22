<?php 

class Message {
    public const allFieldsRequired = "All Fields Are Required";

    // Name
    public const limitNameLen = "Name must be between 2-20 characters";

    // Password
    public const limitPasswordLen = "Password is either too short or too long";

    // Mobile
    public const limitMobileLen = "Mobile not valid";
    public const mobileAlreadyExists = "Mobile already exists";

    // Email
    public const emailOrMobileNotCorrect = "Email or Mobile is not correct. Please try again.";
    public const invalidEmailFormat = "Invalid Email Format";
    public const emailAlreadyExists = "Email already exists";

    //Users
    public const userNotExistInDatabase = "User does not exist in Database";

    // Password
    public const wrongPassword = "Wrong password. Please try again.";
}

?>