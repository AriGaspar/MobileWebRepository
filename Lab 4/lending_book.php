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
        <p class="subtitles">LEND A BOOK</p>
        <center>
            <form action="lending_book_process.PHP" method="post">
                <table border="0" style="border-collapse: collapse;"  >
                    <tr>
                        <td class="input-tag">BOOK ID</td>
                    </tr>
                    <tr>
                        <td><input type="text" width="70px" value="" name="bookid"></td>
                    </tr>
    
                    <tr><td class="input-tag">USER ID</td></tr>
                    <tr>
                        <td><input type="text" width="70px" value="" name="userid"></td>
                    </tr>
    
                    <tr><td class="input-tag">DATE OF LENDING</td></tr>
                    <tr>
                        <td><input type="date" width="70px" value="" name="datelending"></td>
                    </tr>
    
                    <tr><td class="input-tag">DATE OF RETURN</td></tr>
                    <tr>
                        <td><input type="date" width="70px" value="" name="datereturn"></td>
                    </tr>
    
                    <tr style="padding-top: 50px;">
                        <td colspan="2" align="center" >
                            <button class="submit-btn" type="submit">SUBMIT</button>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
</div>

    
</body>
</html>