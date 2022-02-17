# teste-php
Desafio de php proposto pela Promobit

--------------------------------------------------------------------------

# SQL de relatório de tags com produtos #

select tags.*, products.*
from tags
left join product_tag on product_tag.tag_id = tags.id
left join products on product_tag.product_id = products.id
order by tags.id
