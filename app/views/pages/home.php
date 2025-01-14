
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Ticket Generator</title>
</head>
<body>
    <div class="container">

        <img class="imgLogoFull" src="/assets/images/logo-full.svg" alt="logo-full.svg">

        <div class="headerText">
            <h1>Your Journey to Coding Conf 2025 Starts Here!</h1>
            <p>Secure your spot at next year's biggest coding conference.</p>
        </div>

        <form action="/auth" method="post" enctype="multipart/form-data">

            <div class="uploadContainer">
                <label for="imgFile">Upload Avatar</label>
                <div class="uploadArea">
                    <div class="uploadInfo">
                        <div>
                            <img class="imgPreview" src="/assets/images/icon-upload.svg">
                        </div>
                        <span class="imgText">Drag and drop or click to upload</span>
                    </div>
                    <input type="file" name="imgFile" id="imgFile">
                </div>
                <p id="errorMsg">
                    <i class="fa-solid fa-circle-info"></i>
                    <span id="textMsg">Upload your photo (JPG or PNG, max size: 500KB).</span>
                </p>
            </div>

            <label for="">Full Name</label>
            <input class="inputArea" type="text" name="" required>

            <label for="">Email Address</label>
            <input class="inputArea" type="email" name="" placeholder="example@email.com" required>
            
            <!-- <?= '<p class="inputAreaInvalid">
            <i class="fa-solid fa-circle-info"></i>
            Please enter a valid email address.
            </p>' ?> -->
            
            <label for="">GitHub Username</label>
            <input class="inputArea" type="text" name="" placeholder="@yourusername" required>
            
            <button type="submit">Generate My Ticket</button>
        </form>
    </div>
    <script src="/assets/js/script.js"></script>
</body>
</html>