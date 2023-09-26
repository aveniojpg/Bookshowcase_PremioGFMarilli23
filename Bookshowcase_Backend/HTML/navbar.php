<!-- SEZIONE UPPERBAR  -->

<script src="../JS/navbar.js"></script>


<body onload="toggleMenu()">
<div class="upperbar">
    <div class="title">
        <a href="lista.php">Bookshowcase</a>
    </div>
        <form action="cerca.php" method="get" class="searchwrap">

            <div class="searchwrap">
            <img src="../SRC/searchbaricon.png" alt="" class="lensimg">
        <input type="text" placeholder="Cerca un libro" class="searchbar" name="query" id="query">
        <button type="submit" class="lens lens_desktop" name="cerca" id="cerca">
            <img src="../SRC/searchbar_arrow.png" alt="">
        </button>
    </div>
            
    </form>
    <div class="navigation">
        <input type="checkbox" class="toggle-menu">
        <div class="hamburger"></div>
        <div class="menu">
            <div class="menucontainer">
                <a href="../HTML/profile.php" class="menurow">
                    <img src="../SRC/pfpwhite.png" alt="">
                    <div>Profilo</div>
                </a>
                <a href="../HTML/uploadedbooks.php" class="menurow">
                    <img src="../SRC/editwhite.png" alt="">
                    <div>I tuoi annunci</div>
                </a>
                <a href="../HTML/wip.html" class="menurow">
                    <img src="../SRC/whiteheart.png" alt="">
                    <div>Preferiti</div>

                    <a href="inserzione.php" class="menurow">
                        <img src="../SRC/whiteupload.png" alt="">
                        <div>Pubblica un libro</div>
                    </a>

                </a>
                <a href="../PHP/logout.php" class="menurow">
                    <img src="../SRC/redexit.png" alt="" id="exit">
                    <div>Esci</div>
                </a>
            </div>
        </div>
    </div>
    <div class="desktopmenu">
            
           
            <div class="hovercontainer" onclick="toggleMenu()" id="menudesktop">
            <div class="pfphover">
                <img src="../SRC/pfptesting.jpg" alt="">
            </div>
            <div class="bottomarrow">
                <img src="../SRC/arrow-button.png" alt="">
            </div>
            <div class="hovermenu" id="dropdown">
                <a  class="line" href="../HTML/profile.php">
                    <img src="../SRC/user.png" alt="">
                    <div class="hovertext">Profilo</div>
                </a>
                <a  class="line" href="../HTML/uploadedbooks.php">
                    <img src="../SRC/edit.png" alt="">
                    <div class="hovertext">I tuoi annunci</div>
                </a>
                <a  class="line" href="../HTML/wip.html">
                    <img src="../SRC/heart.png" alt="">
                    <div class="hovertext">Preferiti</div>
                </a>
                <a  class="line" href="../PHP/logout.php">
                    <img src="../SRC/redexit.png" alt="">
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
        <img src="../SRC/searchbaricon.png" alt="" class="lensimgmobile">
        <input type="search" placeholder="Cerca un libro" class="searchbarmobile">
        <button type="submit" class="lens lens_mobile">
            <img src="../SRC/searchbar_arrow.png" alt="">
        </button>
         </div>

    
</body>