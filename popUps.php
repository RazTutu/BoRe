<div class="popup-login">
    <div class="popup-content">
        <img src="https://img.icons8.com/carbon-copy/100/000000/close-window.png" alt="close login form" class="closeLogin"/>
        <img src="./images/loading.gif" class="imge" alt="gif happy book"/>
        <form action ="index.php?logout='1'" method="POST">
            <?php include('./backend/errors.php'); ?> 
            <input type="text" placeholder="Username" class="inputLoginForm" name="username" required>
            <input type="password" placeholder="Password" class="inputLoginForm" name="password" required>
            <button type="submit" class="loginFormButton" name="login_user">
                <span>
                    Login
                </span>    
            </button>
            
        </form>
    </div>
</div>

<div class="popup-register">
    <div class="popup-content-register">
        <img src="https://img.icons8.com/carbon-copy/100/000000/close-window.png" alt="close register form" class="closeRegister"/>
        <img src="./images/loading.gif" class="imge" alt="gif happy book"/>
        <form action="index.php?logout='1'" method="POST">
            <?php include('./backend/errors.php'); ?> 
            <input type="email" placeholder="Email" class="inputLoginForm" name="email" required>
            <input type="text" placeholder="Username" class="inputLoginForm" name="username" required>
            <input type="password" placeholder="Password" class="inputLoginForm" name="password_1" required>
            <input type="password" placeholder="Confirm Password" class="inputLoginForm" name="password_2" required>
            <button type="submit" class="loginFormButton" name="reg_user">
                <span>
                    Register 
                </span>    
            </button>
            
        </form>
    </div>
</div>




<script>
    document.getElementById("popup-login").addEventListener("click",function(){
        document.querySelector(".popup-login").style.display = "flex";
    })

    document.querySelector(".closeLogin").addEventListener("click", function(){
        document.querySelector(".popup-login").style.display = "none";
    })
</script>

<script>
    document.getElementById("popup-register").addEventListener("click",function(){
        document.querySelector(".popup-register").style.display = "flex";
    })

    document.querySelector(".closeRegister").addEventListener("click", function(){
        document.querySelector(".popup-register").style.display = "none";
    })
</script>

<script>
    document.getElementById("popup-register2").addEventListener("click",function(){
        document.querySelector(".popup-register").style.display = "flex";
    })
</script>