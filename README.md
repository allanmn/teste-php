# teste-php
Desafio de php proposto pela Promobit com Docker

--------------------------------------------------------------------------

# SQL de relatório de tags com produtos #

select tags.*, products.*
from tags
left join product_tag on product_tag.tag_id = tags.id
left join products on product_tag.product_id = products.id
order by tags.id

---------------------------------------------------------------------------

Para executar o projeto entre no diretorio e rode os seguintes comandos (ou ações equivalentes)
cd micro-01
cp .env.example .env
docker-compose up -d
docker-compose exec micro_01 bash
composer install

agora o projeto vai estar rodando tranquilo, só acessar localhost:8000 :)

(lembrando que deixei a APP_KEY pronta pra economizar tempo, mas qualquer coisa é só apagar e rodar o php artisan key:generate dentro do cash do container)
