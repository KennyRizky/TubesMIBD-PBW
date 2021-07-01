<?php
    if(!isset($_SESSION['usernameTeacher'])){
        echo "Sign In First!";
        die;
    }
?>

<h1 id="addModule">Add Module</h1>

<div id="kotak_addModule">
<div>
    <form action="addModule" method="POST">
        <p class="addModuleForm">Add Module</p>
        <input type="text" name="judulModul" id="judulModul" class="addModuleForm" required>
        <p class="addModuleForm">Module Content</p>
        <textarea name="moduleContent" id="moduleContent" class="addModuleForm" rows="10" cols="85" required></textarea>
        <br><br>
        <input type="submit" value="Upload Module" id="uploadModuleBtn">
    </form>
</div>
</div>  