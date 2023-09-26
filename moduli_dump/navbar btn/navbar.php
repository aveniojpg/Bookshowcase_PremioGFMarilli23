<!-- SEZIONE UPPERBAR  -->
<div class="upperbar">
    <div class="title">
        <a href="lista.php">Bookshowcase</a>
    </div>
    <div>
            <form action="cerca.php" method="get" class="searchwrap">

                <div class="flexsearchbar">

                <input type="text" name="query" id="query" placeholder="Cerca un libro" class="searchbar">
                <button type="submit" name="cerca" id="cerca" class="inputbtn">
                    <img src="/SRC/searchbaricon.png" alt="">
                </button>
            </div>
        </div>
        </form>
    <div class="navigation">
        <input type="checkbox" class="toggle-menu">
        <div class="hamburger"></div>
        <div class="menu">
            <div class="menucontainer">
                <a href="profile.php" class="menurow">
                    <img src="../SRC/profilepic.png" alt="">
                    <div>Profilo</div>
                </a>
                <a href="uploadedbooks.php" class="menurow">
                    <img src="../SRC/edit.png" alt="">
                    <div>I tuoi annunci</div>
                </a>
                <a href="favbooks.html" class="menurow">
                    <img src="../SRC/heart.png" alt="">
                    <div>Preferiti</div>

                    <a href="inserzione.php" class="menurow">
                        <img src="../SRC/whiteupload.png" alt="">
                        <div>Pubblica un libro</div>
                    </a>

                </a>
                <a href="../PHP/logout.php" class="menurow">
                    <img src="../SRC/exit.png" alt="" id="exit">
                    <div>Esci</div>
                </a>
            </div>


        </div>
    </div>
    <div class="desktopmenu">
        <div class="bottomarrow">
            <img src="../SRC/arrow-button.png" alt="">
        </div>

        <div class="hovercontainer">
            <a class="pfphover" href="profile.php">
                <img src="../SRC/pfptesting.jpg" alt="">
            </a>
            <div class="hovermenu">
                <a class="line" href="profile.php">
                    <img src="../SRC/user.png" alt="">
                    <div class="hovertext">Profilo</div>
                </a>
                <a class="line" href="uploadedbooks.php">
                    <img src="../SRC/edit.png" alt="">
                    <div class="hovertext">I tuoi annunci</div>
                </a>
                <a class="line" href="favbooks.html">
                    <img src="../SRC/heart.png" alt="">
                    <div class="hovertext">Preferiti</div>
                </a>
                <a class="line" href="../PHP/logout.php">
                    <img src="../SRC/exit.png" alt="">
                    <div class="hovertext exit">Esci</div>
                </a>
            </div>
        </div>
        <a href="inserzione.php">
            <button class="publish">Pubblica un libro</button>
        </a>


    </div>
</div>
<div class="mobilesection">
    <input type="search" placeholder="Cerca un libro" class="searchbar">
</div>