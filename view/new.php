<?php
    $limt=8;
    $tt = new News();
    if(isset($_GET['loai']))
    {
    $rel=$tt->selectNewslq($_GET['loai'],$limt);
    }else
    {
    $rel=$tt->selectNews($limt);
    }
    while($set=$rel->fetch()):
    ?>
                    <tr style="border-bottom-style: outset;">
                        <td style="
                            background: rgb(0, 198, 247);
                            color:#fff;
                            min-height:50px ;
                            font-weight: 700;
                            font-size: 24px;
                            ">

                            <?php  $date= $date=new DateTime($set[3]);echo $date->format("d-m");?>
    

                        </td>
                        <td id="title" >
                        <a style="color:black;" href="index.php?action=home&act=newone&id= <?php  echo $set['id'];?>&loai=<?php echo $set['loai']?>"> <?php echo $set[1] ?> <br>
                            </a>
                        </td>
                
                    <tr>
                        <td>
                            <hr>
                        </td>
                    </tr>
                    </tr>
                    <?php
    endwhile;
    ?>