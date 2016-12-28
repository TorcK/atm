<? header ("content-type: text/xml");?>
<?='<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <? foreach ($urls as $one) { ?>
    <url>
        <loc><?=site_url($one['loc']);?></loc>
        <lastmod><?=date('Y-m-d', $one['lastmod']);?></lastmod>
        <changefreq>daily</changefreq>
        <priority><?=$one['priority'];?></priority>
    </url>
    <? } ?>
</urlset>