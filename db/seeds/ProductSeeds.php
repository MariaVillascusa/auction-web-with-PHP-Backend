<?php


use Phinx\Seed\AbstractSeed;

class ProductSeeds extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        /* $faker = Faker\Factory::create('es_ES');
         $data = [];

         /*for ($i = 0; $i < 10; $i++) {
             $data[] =
                 [
                     'id' => uniqid(),
                     'name' => $faker->text(30),
                     'price' => $faker->randomNumber(3),
                     'description' => $faker->text(100),
                     'datetime' => $faker->date('Y-m-d','+1 year'),
                     'image' => $faker->imageUrl(640, 480, 'technics')
                 ];
         }*/
        $data[] =
            [
                'id' => uniqid(),
                'name' => 'Apple TV',
                'price' => '250',
                'description' => 'Descripcion del apple TV última generacion',
                'datetime' => '2021-08-01T00:00:00.000Z',
                'image' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/apple-tv-4k-gallery1-thumb-202104_FMT_WHH?wid=1436&hei=850&fmt=jpeg&qlt=80&.v=1617752364000'
            ];
        $data[] =
            [
                'id' => uniqid(),
                'name' => 'Watch 3',
                'price' => '199',
                'description' => 'Proin porttitor purus at quam porta hendrerit. Donec lobortis sem laoreet dui finibus sagittis. Curabitur eleifend egestas risus, vitae rhoncus lorem fermentum vel. Sed lectus sapien, convallis at gravida eu, dapibus vel nibh. Curabitur quis mi a eros venenatis tincidunt. Aenean posuere congue massa, sit amet mattis metus. Vivamus diam mi, vulputate non vulputate nec, elementum a ante. Vestibulum ut eros vehicula, dignissim velit sit amet, cursus nunc. Nullam eros risus, iaculis a elementum sit amet, cursus vel nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et iaculis neque, et vulputate quam. Maecenas vehicula posuere nisi at bibendum. Donec convallis tortor purus, non convallis tortor eleifend eget.',
                'datetime' => '2021-08-02T00:00:00.000Z',
                'image' => 'https://www.smartwatchzone.net/wp-content/uploads/2020/09/huawei-watch-fit.jpg'
            ];
        $data[] =
            [
                'id' => uniqid(),
                'name' => 'Ratón MX Master3',
                'price' => '90',
                'description' => 'Proin porttitor purus at quam porta hendrerit. Donec lobortis sem laoreet dui finibus sagittis. Curabitur eleifend egestas risus, vitae rhoncus lorem fermentum vel. Sed lectus sapien, convallis at gravida eu, dapibus vel nibh. Curabitur quis mi a eros venenatis tincidunt. Aenean posuere congue massa, sit amet mattis metus. Vivamus diam mi, vulputate non vulputate nec, elementum a ante. Vestibulum ut eros vehicula, dignissim velit sit amet, cursus nunc. Nullam eros risus, iaculis a elementum sit amet, cursus vel nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et iaculis neque, et vulputate quam. Maecenas vehicula posuere nisi at bibendum. Donec convallis tortor purus, non convallis tortor eleifend eget.',
                'datetime' => '2021-08-30T00:00:00.000Z',
                'image' => 'https://www.muycomputer.com/wp-content/uploads/2019/09/Logitech-MX-Master-3.jpg'
            ];
        $data[] =
            [
                'id' => uniqid(),
                'name' => 'Hub para MacBook',
                'price' => '75',
                'description' => 'Proin porttitor purus at quam porta hendrerit. Donec lobortis sem laoreet dui finibus sagittis. Curabitur eleifend egestas risus, vitae rhoncus lorem fermentum vel. Sed lectus sapien, convallis at gravida eu, dapibus vel nibh. Curabitur quis mi a eros venenatis tincidunt. Aenean posuere congue massa, sit amet mattis metus. Vivamus diam mi, vulputate non vulputate nec, elementum a ante. Vestibulum ut eros vehicula, dignissim velit sit amet, cursus nunc. Nullam eros risus, iaculis a elementum sit amet, cursus vel nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et iaculis neque, et vulputate quam. Maecenas vehicula posuere nisi at bibendum. Donec convallis tortor purus, non convallis tortor eleifend eget.',
                'datetime' => '2021-08-28T00:00:00.000Z',
                'image' => 'https://www.soydemac.com/wp-content/uploads/2018/11/hub-satechi-mac-830x493.jpg'
            ];
        $data[] =
            [
                'id' => uniqid(),
                'name' => 'Webcam Logi',
                'price' => '130',
                'description' => 'Proin porttitor purus at quam porta hendrerit. Donec lobortis sem laoreet dui finibus sagittis. Curabitur eleifend egestas risus, vitae rhoncus lorem fermentum vel. Sed lectus sapien, convallis at gravida eu, dapibus vel nibh. Curabitur quis mi a eros venenatis tincidunt. Aenean posuere congue massa, sit amet mattis metus. Vivamus diam mi, vulputate non vulputate nec, elementum a ante. Vestibulum ut eros vehicula, dignissim velit sit amet, cursus nunc. Nullam eros risus, iaculis a elementum sit amet, cursus vel nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et iaculis neque, et vulputate quam. Maecenas vehicula posuere nisi at bibendum. Donec convallis tortor purus, non convallis tortor eleifend eget.',
                'datetime' => '2021-08-25T00:00:00.000Z',
                'image' => 'https://teletrabajohoy.es/wp-content/uploads/2020/09/151063-laptops-news-logitech-streamcam-is-a-webcam-aimed-at-streamers-and-content-creators-image1-7ttqhvuida.jpg'
            ];
        $data[] =
            [
                'id' => uniqid(),
                'name' => 'Play Station 4',
                'price' => '300',
                'description' => 'Proin porttitor purus at quam porta hendrerit. Donec lobortis sem laoreet dui finibus sagittis. Curabitur eleifend egestas risus, vitae rhoncus lorem fermentum vel. Sed lectus sapien, convallis at gravida eu, dapibus vel nibh. Curabitur quis mi a eros venenatis tincidunt. Aenean posuere congue massa, sit amet mattis metus. Vivamus diam mi, vulputate non vulputate nec, elementum a ante. Vestibulum ut eros vehicula, dignissim velit sit amet, cursus nunc. Nullam eros risus, iaculis a elementum sit amet, cursus vel nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et iaculis neque, et vulputate quam. Maecenas vehicula posuere nisi at bibendum. Donec convallis tortor purus, non convallis tortor eleifend eget.',
                'datetime' => '2021-08-08T00:00:00.000Z',
                'image' => 'https://cdn.pixabay.com/photo/2017/05/19/14/09/ps4-2326616_960_720.jpg'
            ];
        $data[] =
            [
                'id' => uniqid(),
                'name' => 'PC sobremesa i5',
                'price' => '750',
                'description' => 'Proin porttitor purus at quam porta hendrerit. Donec lobortis sem laoreet dui finibus sagittis. Curabitur eleifend egestas risus, vitae rhoncus lorem fermentum vel. Sed lectus sapien, convallis at gravida eu, dapibus vel nibh. Curabitur quis mi a eros venenatis tincidunt. Aenean posuere congue massa, sit amet mattis metus. Vivamus diam mi, vulputate non vulputate nec, elementum a ante. Vestibulum ut eros vehicula, dignissim velit sit amet, cursus nunc. Nullam eros risus, iaculis a elementum sit amet, cursus vel nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et iaculis neque, et vulputate quam. Maecenas vehicula posuere nisi at bibendum. Donec convallis tortor purus, non convallis tortor eleifend eget.',
                'datetime' => '2021-08-07T00:00:00.000Z',
                'image' => 'https://oficina10.top/imagenes/las-8-mejores-torres-de-ordenador-baratas.jpg'
            ];
        $data[] =
            [
                'id' => uniqid(),
                'name' => 'iMac 24" 2020',
                'price' => '1300',
                'description' => 'Proin porttitor purus at quam porta hendrerit. Donec lobortis sem laoreet dui finibus sagittis. Curabitur eleifend egestas risus, vitae rhoncus lorem fermentum vel. Sed lectus sapien, convallis at gravida eu, dapibus vel nibh. Curabitur quis mi a eros venenatis tincidunt. Aenean posuere congue massa, sit amet mattis metus. Vivamus diam mi, vulputate non vulputate nec, elementum a ante. Vestibulum ut eros vehicula, dignissim velit sit amet, cursus nunc. Nullam eros risus, iaculis a elementum sit amet, cursus vel nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et iaculis neque, et vulputate quam. Maecenas vehicula posuere nisi at bibendum. Donec convallis tortor purus, non convallis tortor eleifend eget.',
                'datetime' => '2021-08-15T00:00:00.000Z',
                'image' => 'https://cdn.pixabay.com/photo/2015/01/21/14/14/apple-606761_960_720.jpg'
            ];

        $this->table('products')->insert($data)->saveData();
    }

}
