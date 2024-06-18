<?php
//include '/setting.php';
session_start();
?>
<div class="register-main__page">
    <div class="register-page" id="register-content">
        <div class="page-content">
            <h1>CodeTikki Coding World Cup</h1>
            <p>Where Code meets Cricket: Unleash your skills in the Ultimate Coding World Cup</p>
        </div>
        <div class="register-box" id="register-box">
            <h1>Registration</h1>
            <input id="register" type="submit" value="Register" >
        </div>
        <form method="post" action="../../../core/main/form_handler.php" id="world-cup-form" class="hidden">
            <div class="form-inner">
                <span>
                    <label>UserID1:</label>
                    <input type="text" name="text" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>" readonly >
                </span>
                <span>
                    <label>MailID1:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['mail_id']); ?>"   readonly >
                </span>
                <input type="submit" id="next-btn" value="Next">
            </div>
        </form>
        <form method="post" action="core/main/varify_handler.php"  id="verify-phone-form" class="hidden">
            <div class="form-inner">
                <label>Enter Your WhatsAPP No:</label>
                    <input type="phone" name="phone" id="phone">
                    <input type="submit" id="confirm-btn" value="Confirm" >
                    <input type="submit" id="change-btn" value="Change" >
            </div>
        </form>
        <form method="post" action="core/main/subject_handler.php" id="select-subject" class="hidden">
            <div class="form-inner">
                <h4>VERIFY YOUR SUBJECTS</h4>
                <div class="checkbox-container">
        
                <div class="first">
                <div class="ckbutton">
                    <label>  
                        <input class="subject" name="subject[html]" type="checkbox" value="html"  onclick="addSubject('html')"  >
    					<span>HTML</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[css]" type="checkbox" value="css"  onclick="addSubject('css')" >
    					<span>CSS</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[javascript]" type="checkbox" value="javascript"  onclick="addSubject('javascript')" >
    					<span>Javascript</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[java]" type="checkbox" value="java"  onclick="addSubject('java')" >
    					<span>Java</span>
                    </label>
                </div>
                </div>
                <div class="second">
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[C++]" type="checkbox" value="C++"  onclick="addSubject('C++')" >
    					<span>C++</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[Python]" type="checkbox" value="Python"   onclick="addSubject('Python')">
    					<span>Python</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[React]" type="checkbox" value="React"  onclick="addSubject('React')" >
    					<span>React</span>
                    </label>
                </div>
                <div class="ckbutton">
                    <label>                                          
                        <input class="subject" name="subject[Angular]" type="checkbox" value="Angular"  onclick="addSubject('Angular')" >
    					<span>Angular</span>
                    </label>
                </div>
                </div>
                </div>
                <input type="submit" id="confirm-subject-btn" value="Confirm" >
                <input type="submit" id="change-btn" value="Change" >                   
            </div>
            <div id="selected-subjects-container" class="selected-subjects-container">    
            </div>
        </form>
        <form  id="confirm-form" class="hidden">
            <div class="form-inner">
                <h3>Congratulations</h3>
                <p>you have successfully regitered</p>
                    <input type="submit" id="confirm-final-btn" value="Confirm" >
                    <input type="submit" id="change-final-btn" value="Change" >
            </div>
        </form>
        <form  id="register-page" class="hidden">
            <div class="form-inner">
                <h2 > Registered</h2>

            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="themes/main/nav-page/js/world_cup_script.js"></script>