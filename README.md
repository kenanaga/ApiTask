## İcmal:

Kargo şirkətinin bir neçə partnor şirkətləri var. Onlar API vasitəsilə sorğu yollayaraq bağlamalar yaradırlar. Daha sonra yollanan bu bağlamaların sahiblərinə email göndərib onlara bağlamalarının anbara çatması ilə bağlı məlumat verilir.

## Tapşırıq:

Laraveldən istifadə etməklə, API sistemi qurmaq lazımdır. Burada qarşı tərəfin login edərək token almalı, daha sonra tokendən istifadə etməklə sorğular yollamalıdır. 
Bağlama yaratmaq üçün lazım olan “field”-lər:

“tracking_code”, “shipping_price”, “price”, “category”, “first_name”, “last_name”, “phone_number”, “email”

## Qeyd: “tracking_code” təkrarlana bilməz. İstifadəçiyə aid olan məlumatlarla, bağlama məlumatları ayrı “table”-larda saxlanılmalıdır.

Qarşı tərəf eyni sorğuda 1-1000 bağlama yollaya bilər. 
Məlumatları bazaya yazdıqdan sonra, istifadəçilərə “bağlamanız anbara çatdı“ adlı bir email göndərilməlidir. 1 istifadəçiyə eyni email 1 dəfədən artıq göndərilə bilməz.
