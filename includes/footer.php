        <script>
            //  document.getElementById("declineB").addEventListener("click", function(){
            //         document.querySelector(".popup3").style.display = "flex";
            //     })

            //     document.getElementById("closeDecB").addEventListener("click", function(){
            //         document.querySelector(".popup3").style.display = "none";
            //     })
            document.getElementById("verPass").addEventListener("click", function(){
            document.querySelector(".popupDeact").style.display = "none";
            document.querySelector(".popupDeactCon").style.display = "flex";
            })
        </script>
        <script>
        function myFunction2() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("mylist2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[4];
                    if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    }
                }
            }

            document.getElementById("viewB").addEventListener("click", function(){
                document.querySelector(".popup").style.display = "flex";
            })

            document.getElementById("closeB").addEventListener("click", function(){
            document.querySelector(".popup").style.display = "none";
            })
            document.getElementById("nextB").addEventListener("click", function(){
                document.querySelector(".popup1").style.display = "flex";
                document.querySelector(".popup").style.display = "none";
            })
            document.getElementById("backB").addEventListener("click", function(){
                document.querySelector(".popup1").style.display = "none";
                document.querySelector(".popup").style.display = "flex";
            })
            document.getElementById("close1B").addEventListener("click", function(){
            document.querySelector(".popup1").style.display = "none";
            })
            document.getElementById("next1B").addEventListener("click", function(){
                document.querySelector(".popup2").style.display = "flex";
                document.querySelector(".popup1").style.display = "none";
            })
            document.getElementById("back1B").addEventListener("click", function(){
                document.querySelector(".popup2").style.display = "none";
                document.querySelector(".popup1").style.display = "flex";
            })
            document.getElementById("close2B").addEventListener("click", function(){
            document.querySelector(".popup2").style.display = "none";
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
    </body>
</html>