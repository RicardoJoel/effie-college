<?php
  
use Illuminate\Database\Seeder;
use App\Marca;
   
class CreateMarcasSeeder extends Seeder
{
    public static $marcas;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'nombre'      =>  'Entel Perú',
                'imagen'      =>  'images/logo-entel.png',
                'descripcion' =>  'Entel Perú es una filial perteneciente al grupo Entel Chile. Desde su lanzamiento en octubre de 2014 hasta diciembre de 2018, se ha posicionado como el operador líder de portabilidad, según cifras oficiales de Osiptel. En la actualidad, cuenta con más de 7 millones de suscriptores en telefonía móvil. Entel Perú ostenta el Primer Lugar en Mejor Experiencia de Cliente en Iberoamérica por Best Customer Experience (BCX). En el 2018, fue reconocida como una de las empresas más admiradas a nivel nacional. Es la empresa de telecomunicaciones con mayor crecimiento en el Perú y la quinta a nivel mundial. No debe confundirse con el nombre de la empresa estatal peruana Empresa Nacional de Telecomunicaciones (Entel Perú) creada el 9 de noviembre de 1969 por Decreto Ley N° 17881 y vendida a Telefónica en el año 1994.',
            ],
            [
                'nombre'      =>  'Sodimac',
                'imagen'      =>  'images/logo-sodimac.png',
                'descripcion' =>  'Sodimac es una cadena chilena de comercios de la construcción, ferretería y mejoramiento del hogar, perteneciente al holding Falabella. Actualmente cuenta con sucursales en Chile, Perú, Colombia, México, Argentina, Brasil y Uruguay. Sodimac se fundó en Chile en 1952 como una cooperativa abastecedora de empresas constructoras, convirtiéndose en sociedad anónima en los años 1980. Actualmente es una compañía del holding Falabella que posee más de 100 tiendas en nueve países de América. La empresa se encuentra en proceso de expansión a nuevos países como Brasil y México.',
            ],
            [
                'nombre'      =>  'UNACEM',
                'imagen'      =>  'images/logo-unacem.png',
                'descripcion' =>  'En el 2003 crea Asociación UNACEM (Antes Asociación Atocongo) como su organización de Responsabilidad Social, que canaliza y potencializa esfuerzos para el desarrollo de la comunidad, y gestiona la Responsabilidad Social Corporativa con colaboradores, accionistas, clientes, proveedores, medio ambiente y gobierno.',
            ],
            [
                'nombre'      =>  'Alicorp',
                'imagen'      =>  'images/logo-alicorp.png',
                'descripcion' =>  'La empresa conocida ahora como Alicorp se inició en 1956 como Industrias Anderson, Clayton & Co. como fabricante de aceites y sopas en el puerto de Callao, Perú. En 1971, el conglomerado peruano Grupo Romero adquirió Anderson, Clayton & Co. y le cambió el nombre a Compañía Industrial Perú Pacífico S.A. (CIPPSA). La empresa sobrevivió durante los años de régimen militar en Perú y durante los 90 se embarcó en varias adquisiciones. En 1993, absorbió Calixto Romero S.A. y Compañía Oleaginosa Pisco S.A. que también pertenecían al Grupo Romero. En 1995 adquirió La Fabril S.A., la fabricante de alimentos más grande de Perú del Grupo Bunge y Born de Argentina. CIPPSA cambió su nombre a Consorcio de Alimentos Fabril Pacífico S.A. (CFP) En 1995. CFP se fusionó con Nicolini Hermanos S.A. y Compañía Molinera del Perú S.A. en 1996 y cambió su nombre a Alicorp en 1997.',
            ],
            [
                'nombre'      =>  'Pilsen Trujillo',
                'imagen'      =>  'images/logo-pilsen.png',
                'descripcion' =>  'Trujillo es una marca de cerveza pilsen peruana de propiedad de Backus y Johnston. Esta cerveza se vende en botellas de vidrio de 310 ml, 355 ml, 500 ml, 620 ml, y en latas. Pilsen Trujillo es una marca originaria de la ciudad de Trujillo localizada en la costa norte peruana. Antes de la adquisición por parte de Backus en 1994, Pilsen Trujillo fue elaborada por la Sociedad Cervecera de Trujillo SA, que también produjo la marca de cerveza La Norteña. La primera cerveza producida por la compañía fue nombrada Libertad en honor al nombre de la Región La Libertad, donde se encuentra Trujillo. El 19 de enero de 2013 en la ciudad de Trujillo 653 parejas bailaron marinera y lograron un Récord Guinness de marinera al constituirse el mayor número de parejas reunidas para realizar esta danza en una misma pista de baile. El evento fue impulsado por la marca Pilsen Trujillo.',
            ],
            [
                'nombre'      =>  'BCP',
                'imagen'      =>  'images/logo-bcp.png',
                'descripcion' =>  'El Banco de Crédito del Perú (BCP) es el banco más grande y el proveedor líder de servicios financieros integrados en el Perú, con aproximadamente US$ 39 mil millones en activos totales y una participación de mercado de 30,4% en créditos totales y 33,5% en depósitos totales. BCP tiene más de 127 años de presencia en el país y es la marca más valiosa del Perú. Su red de más de 8340 puntos de contacto sirve a sus más de 13 millones de clientes. BCP es la principal subsidiaria de Credicorp, el mayor holding financiero peruano. La Banca Mayorista del BCP compite con bancos locales y extranjeros, y ofrece a sus clientes préstamos a corto y mediano plazo en moneda local y extranjera, financiamientos para comercio exterior, leasing, seguros y asesoría financiera. Actualmente es el líder del mercado con una participación de mercado de más del 40% en créditos corporativos.',
            ],
        ];
  
        foreach ($array as $key => $value)
            self::$marcas[] = Marca::create($value);
    }
}
