<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/myscript.js" ></script>
    <title>LMS</title>
</head>
<body>

    <?php 
        include('components/header.html')
    ?>
    <?php 
        include('components/banner.html')
    ?>

<div class="main-content">
    <div class="add-book-content">
        <p class="subtitles">ADD BOOK</p>
        <center>
            <form action="add_book_process.PHP" method="post">
                <table border="0" style="border-collapse: collapse;"  >
                    <tr>
                        <td class="input-tag">BOOK</td>
                    </tr>
                    <tr>
                        <td><input type="text" width="70px" value="" name="book"></td>
                    </tr>
    
                    <tr><td class="input-tag">AUTHOR'S NAME</td></tr>
                    <tr>
                        <td><input type="text" width="70px" value="" name="authorname"></td>
                    </tr>
    
                    <tr><td class="input-tag">PRICE</td></tr>
                    <tr>
                        <td><input type="text" width="70px" value="" name="price"></td>
                    </tr>
    
                    <tr><td class="input-tag">PUBLISHER</td></tr>
                    <tr>
                        <td><input type="text" width="70px" value="" name="publisher"></td>
                    </tr>
    
                    <tr><td class="input-tag">EDITION NO.</td></tr>
                    <tr>
                        <td><input type="text" width="70px" value="" name="edition"></td>
                    </tr>
    
                    <tr><td class="input-tag">PUBLICATION YEAR</td></tr>
                    <tr>
                        <td><input type="text" width="70px" value="" name="publicationyear"></td>
                    </tr>
    
                    <tr><td class="input-tag">DESCRIPTION</td></tr>
                    <tr>
                        <td><textarea type="text" width="70px" value="" name="desc" rows="5"></textarea></td>
                    </tr>
    
                    <tr style="padding-top: 50px;">
                        <td colspan="2" align="center" >
                            <button class="submit-btn" type="submit">ADD BOOK</button>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
</div>

    
</body>
</html>