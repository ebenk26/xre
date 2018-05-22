<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url();?></loc> 
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= base_url(); ?>signup</loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?= base_url(); ?>login</loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?= base_url(); ?>job/search</loc>
        <priority>0.5</priority>
    </url>
    <?php foreach($data as $url) { ?>
    <url>
        <loc><?= base_url().$url['slug']; ?></loc>
        <priority>0.5</priority>
    </url>
    <?php } ?>
    <?php foreach($blogs as $url) { ?>
    <url>
        <loc><?= base_url().'article/'.$url['slug']; ?></loc>
        <priority>0.5</priority>
    </url>
    <?php } ?>
</urlset>