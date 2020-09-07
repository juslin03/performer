
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="home-banner">
                    <img src="{{ asset('images/entredigiteuz.jpeg') }}" alt="Plus de 200 formations à distance" width="600" height="383">
                    <div class="content panel tertiary">
                        <div class="title upper">
                        <div style="text-align:center;"> <a href="#">BOOTCAMP ENTRE DIGITEUZ</a> </div>
                        </div>
                        <div class="text primary">
                        <div> Utiliser le digital comme levier pour booster votre business. </div>
                        </div>
                        <div class="form-actions a-center"> <a href="register.php" class="button btn">Inscrivez-vous maintenant !</a> </div>
                    </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var modal = document.getElementById("myModal");

                var span = document.getElementsByClassName("close")[0];

                span.onclick = function () {
                    modal.style.display = "none";
                    modal.style.backgroundColor = 'rgba(032, 032, 032, 0.7)';
                };

                window.onload = function () {
                    modal.style.display = "block";
                }
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                };
            </script>
