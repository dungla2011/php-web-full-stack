<?php
require_once "../templates/home/header.php"
?>


News

<style>

    p {
        padding: 0px;
        margin: 0px
    }

    td img {
        height: 100px
    }

    td {
        padding: 10px
    }

</style>

<table>

    <?php 

    require_once "../app/models/News.php";
    
    $limit = 3;
    $pr = [
        'page' => 1,
        'limit' => $limit,
    ];

    $ret = News::list($pr);

    echo "<pre>";
    print_r($ret);
    echo "</pre>";

    for($i = 0; $i < $limit; $i++){
    ?>
    <tr>
        <td>
            <a href="#">
            <img src="/images/img1.jpg" alt="">
            </a>
        </td>
        <td>   
            <a href="#">     
                <b>
                Tin tức số 1
                </b>
            </a>

            <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam sit illum, impedit architecto repellendus necessitatibus nemo voluptates, ipsa, dolores voluptate excepturi neque nihil officia distinctio totam sint obcaecati beatae. Delectus ex nesciunt nemo quia blanditiis cumque dolores maiores reprehenderit rem! Incidunt veniam ab ipsum quam necessitatibus impedit facilis itaque vel!
            </p>
        </td>
    </tr>

    <?php
    }
    ?>

</table>



<?php
require_once "../templates/home/footer.php"
?>
