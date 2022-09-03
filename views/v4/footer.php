<script>
    let menuprofil = document.querySelector("#menuprofil");
    let avatar = document.querySelector("#avatar");
    let hidden = true;

    avatar.addEventListener("click",() => {
        if(hidden == true){
            menuprofil.classList.remove('hidden');
            hidden = false;
        } else {
            menuprofil.classList.add('hidden');
            hidden = true;
        }
    });
</script>

</body>
</html>