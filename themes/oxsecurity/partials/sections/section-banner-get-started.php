<section class="banner-glossary">
    <div class="">
        <h2><?php the_field("banner_title", "option") ?></h2>
        <h3><?php the_field("banner_subtitle", "option") ?></h3>
        <div><?php the_field("banner_content", "option") ?></div>
        <div class="banner-buttons">
            <div>
                <a href="">Start free</a>
            </div>
            <div>
                <a href="">Get a demo</a>
            </div>
        </div>
    </div>
</section>

<style>
    .banner-glossary{
        width:100%;
        margin:20px 0;
        padding:20px;
        text-align:center;
        background-color:blue;
        border-radius:20px;
    }
    .banner-glossary h2,
    .banner-glossary h3{
        color: white;
    }
    .banner-glossary .banner-buttons{
        display:flex;
        justify-content: center;
        gap:20px;
    }
    .banner-glossary .banner-buttons div{
        text-align:center;
        padding:10px 10px;
        border: 1px solid white;
        border-radius:20px;
    }
    .banner-glossary .banner-buttons div:nth-child(1){
        background-color: white;
    }
    .banner-glossary .banner-buttons div:nth-child(1) a{
        color: blue;
    }
    .banner-glossary .banner-buttons div:nth-child(2){
        background-color: blue;
    }
    .banner-glossary .banner-buttons div:nth-child(2) a{
        color: white;
    }
</style>