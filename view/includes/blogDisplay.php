<?php
foreach ($results as $result){
    echo "
        <article>
            <img alt=".$result["article_img"]." src=".$absolutePath."assets/images/".$result["article_img"].">
            <div>
                <h3>".$result["article_title"]." - <span class='addDate'>".mb_substr($result["article_createdate"],0,-3)."</span>
                    <span class='creator'>".$result["user_firstname"]." ".$result["user_name"]."</span>
                </h3>
                <p class='content'>".$result["article_content"]."</p>
            </div>
        </article>
    ";
}
?>