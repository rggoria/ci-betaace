<!-- <footer class="bg-light text-center text-lg-start mt-5"> -->
<footer class="mt-auto">
  <!-- Copyright -->
  <div class="text-center p-3 text-light">
    &copy 2022 Copyright: Beta Ace
  </div>
  <!-- Copyright -->
</footer>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // Javascript of show and hide of a single password
        function showPass() {
            var passInput = document.getElementById("password");
            if (passInput.type === "password")
                passInput.type = "text";
            else
                passInput.type = "password"
        }
        // Javascript of show and hide of all password
        function showAllPass(input) {
            var passInput = document.getElementsByClassName("passInp");
            for (let inputs of passInput)
                inputs.type = input.checked ? "text" : "password";
        }
    </script>
</body>
</html>