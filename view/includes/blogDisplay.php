<?php
echo "
    <article>
        <img alt=".$article->getTitle()." src=/assets/images/".$article->getImg().">
        <div>
            <h3>".$article->getTitle()." - <span class='addDate'>".    DateTime::createFromFormat('Y-m-d H:i:s', $article->getCreatedAt())->format('d-m-Y')."</span>
                <span class='creator'>".$article->getAuthor()."</span>
            </h3>
            <p class='content'>".$article->getContent()."</p>
        </div>
    </article>
";
