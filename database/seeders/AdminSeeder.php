<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name='Bruno Marchesani';
        $user->email='brunomarchesanii@gmail.com';
        $user->password=Hash::make('Asdf1234!');
        $user->save();

        $home = new Admin();

        $home->imagenPrincipal='public/imagenHome/1607457108_4aBI6Ahz5KFdzsSdYoJcJaHbOvfYCj6CxEaS2A5tPYhPcOCiHDpjkatvHkMYA9XfeAPAWQ8IjabAlyfp.jpg';
        $home->imagenPrincipal_low='public/imagenHome/1607457108_4aBI6Ahz5KFdzsSdYoJcJaHbOvfYCj6CxEaS2A5tPYhPcOCiHDpjkatvHkMYA9XfeAPAWQ8IjabAlyfpLowres.jpg';
        $home->textoPrincipal='<p><span style="color:hsl(192, 15%, 99%);">Hola Soy Bruno Marchesani</span></p>';
        $home->colorRedes='white';
        $home->colorFooter=null;
        $home->textoFooter=null;
        $home->colorNavbar='transparent';
        $home->textoNavbar='white';
        $home->colorDiv=null;
        $home->colorCuerpo=null;
        $home->textoCuerpo=null;
        $home->colorBotonUp='white';
        $home->textoBotonUp='black';
        $home->colorNavM='#424242';
        $home->textoNavM='white';
        $home->imagenSecundaria=null;

        $home->save();

        $individuales = new Admin();

        $individuales->imagenPrincipal='public/imagenIndividuales/1607457115_usjvs21isyBmB7vJKMNHnEDxodfXzAKhQOrFMMxsYV6j8hNwhnFedNerUlGjBwM6yYybqqtTrCKykhB7.jpg';
        $individuales->imagenPrincipal_low='public/imagenIndividuales/1607457115_usjvs21isyBmB7vJKMNHnEDxodfXzAKhQOrFMMxsYV6j8hNwhnFedNerUlGjBwM6yYybqqtTrCKykhB7Lowres.jpg';
        $individuales->textoPrincipal='<p><span style="color:hsl(192, 15%, 99%);">Individuales</span></p>';
        $individuales->colorRedes='black';
        $individuales->colorFooter='#212121';
        $individuales->textoFooter='white';
        $individuales->colorNavbar='transparent';
        $individuales->textoNavbar='white';
        $individuales->colorDiv='grey';
        $individuales->colorCuerpo='#f5f5f5';
        $individuales->textoCuerpo='Esta es una descripcion base para la configuracion de la pagina en el servidor';
        $individuales->colorBotonUp='black';
        $individuales->textoBotonUp='white';
        $individuales->colorNavM='#424242';
        $individuales->textoNavM='white';
        $individuales->imagenSecundaria=null;

        $individuales->save();

        $historias = new Admin();

        $historias->imagenPrincipal='public/imagenHistorias/1608330734_mp2hbxWnkR3e2rXm2ABzPOwi9hZR7vQFkqtEO3IYMUAdlDHdALRb9CszOyUtDs9J0wlsTki6ZVOh00IV.jpg';
        $historias->imagenPrincipal_low='public/imagenHistorias/1608330734_mp2hbxWnkR3e2rXm2ABzPOwi9hZR7vQFkqtEO3IYMUAdlDHdALRb9CszOyUtDs9J0wlsTki6ZVOh00IVLowres.jpg';
        $historias->textoPrincipal='<p><span style="color:hsl(192, 15%, 99%);">Historias</span></p>';
        $historias->colorRedes='black';
        $historias->colorFooter='#212121';
        $historias->textoFooter='white';
        $historias->colorNavbar='transparent';
        $historias->textoNavbar='white';
        $historias->colorDiv='grey';
        $historias->colorCuerpo='#f5f5f5';
        $historias->textoCuerpo='Esta es una descripcion base para la configuracion de la pagina en el servidor';
        $historias->colorBotonUp='black';
        $historias->textoBotonUp='white';
        $historias->colorNavM='#424242';
        $historias->textoNavM='white';
        $historias->imagenSecundaria=null;

        $historias->save();

        $proyectos = new Admin();

        $proyectos->imagenPrincipal='public/imagenProyectos/1607457136_LI6KGAoqGGMIOzFcXdNsqyn5SSiKIbF5z89gPbGyp0Kk60xojKjzKn58EqnM6ut9UVhLtjHPK9dXGUSF.jpg';
        $proyectos->imagenPrincipal_low='public/imagenProyectos/1607457136_LI6KGAoqGGMIOzFcXdNsqyn5SSiKIbF5z89gPbGyp0Kk60xojKjzKn58EqnM6ut9UVhLtjHPK9dXGUSFLowres.jpg';
        $proyectos->textoPrincipal='<p><span style="color:hsl(192, 15%, 99%);">Proyectos</span></p>';
        $proyectos->colorRedes='black';
        $proyectos->colorFooter='#212121';
        $proyectos->textoFooter='white';
        $proyectos->colorNavbar='transparent';
        $proyectos->textoNavbar='black';
        $proyectos->colorDiv='grey';
        $proyectos->colorCuerpo='#f5f5f5';
        $proyectos->textoCuerpo='Esta es una descripcion base para la configuracion de la pagina en el servidor';
        $proyectos->colorBotonUp='black';
        $proyectos->textoBotonUp='white';
        $proyectos->colorNavM='#424242';
        $proyectos->textoNavM='white';
        $proyectos->imagenSecundaria=null;

        $proyectos->save();

        $viajes = new Admin();

        $viajes->imagenPrincipal='public/imagenViajes/1607457146_dFLZELPFcPk8sEib8zpTml92xaeK5HCq6BdJ4RrhM2Y0oEo2auGK31Eob0DKAmWD9VMogd3YsnsvNChX.jpg';
        $viajes->imagenPrincipal_low='public/imagenViajes/1607457146_dFLZELPFcPk8sEib8zpTml92xaeK5HCq6BdJ4RrhM2Y0oEo2auGK31Eob0DKAmWD9VMogd3YsnsvNChXLowres.jpg';
        $viajes->textoPrincipal='Viajes';
        $viajes->colorRedes='black';
        $viajes->colorFooter='#212121';
        $viajes->textoFooter='white';
        $viajes->colorNavbar='transparent';
        $viajes->textoNavbar='black';
        $viajes->colorDiv='grey';
        $viajes->colorCuerpo='#f5f5f5';
        $viajes->textoCuerpo='Esta es una descripcion base para la configuracion de la pagina en el servidor';
        $viajes->colorBotonUp='black';
        $viajes->textoBotonUp='white';
        $viajes->colorNavM='#424242';
        $viajes->textoNavM='white';
        $viajes->imagenSecundaria=null;

        $viajes->save();

        $sobremi = new Admin();

        $sobremi->imagenPrincipal='public/imagenSobremi/1607457163_7yLXvZ5V7e9pKx1WBmzgEhkkSkBIGcKDNZzZNezKKb5Tim9hwChXjfBs4BlZ8udlLqpfN3v889nxnogF.jpg';
        $sobremi->imagenPrincipal_low='public/imagenSobremi/1607457163_7yLXvZ5V7e9pKx1WBmzgEhkkSkBIGcKDNZzZNezKKb5Tim9hwChXjfBs4BlZ8udlLqpfN3v889nxnogFLowres.jpg';
        $sobremi->textoPrincipal='<p><span style="color:hsl(192, 15%, 99%);">Sobre Mi</span></p>';
        $sobremi->colorRedes=null;
        $sobremi->colorFooter='#212121';
        $sobremi->textoFooter='white';
        $sobremi->colorNavbar='transparent';
        $sobremi->textoNavbar='white';
        $sobremi->colorDiv='grey';
        $sobremi->colorCuerpo='#f5f5f5';
        $sobremi->textoCuerpo='Esta es una descripcion base para la configuracion de la pagina en el servidor';
        $sobremi->colorBotonUp='black';
        $sobremi->textoBotonUp='white';
        $sobremi->colorNavM='#424242';
        $sobremi->textoNavM='white';
        $sobremi->imagenSecundaria='public/imagenSobremiSecundaria/1607457163_0bmD5CgGxHisULoCTcsnbPoYzFCBuQb2XVD2ZQxp1RMzApp6Jx9zKV98JynFOHlAyqvpWKJAtoG5KM4J.jpg';
        $sobremi->imagenSecundaria_low='public/imagenSobremiSecundaria/1607457163_0bmD5CgGxHisULoCTcsnbPoYzFCBuQb2XVD2ZQxp1RMzApp6Jx9zKV98JynFOHlAyqvpWKJAtoG5KM4JLowres.jpg';

        $sobremi->save();

        $contacto = new Admin();

        $contacto->imagenPrincipal='public/imagenContacto/1607457180_2Htuq9ZKTWYyi4skv6hK8SdZsdYOgeItDtFZtDcvcYCFb75AquKM3BP3KoB1k2SbVU04e377kd8EipYI.jpg';
        $contacto->imagenPrincipal_low='public/imagenContacto/1607457180_2Htuq9ZKTWYyi4skv6hK8SdZsdYOgeItDtFZtDcvcYCFb75AquKM3BP3KoB1k2SbVU04e377kd8EipYILowres.jpg';
        $contacto->textoPrincipal='Contacto';
        $contacto->colorRedes=null;
        $contacto->colorFooter='#212121';
        $contacto->textoFooter='white';
        $contacto->colorNavbar='transparent';
        $contacto->textoNavbar='black';
        $contacto->colorDiv='grey';
        $contacto->colorCuerpo='#f5f5f5';
        $contacto->textoCuerpo='black';
        $contacto->colorBotonUp='black';
        $contacto->textoBotonUp='white';
        $contacto->colorNavM='#424242';
        $contacto->textoNavM='white';
        $contacto->imagenSecundaria='public/imagenContactoSecundaria/1607457181_9dLlpoCzuqOaV7bnQYu1a69ZzP2aPMu7XdD00r8cTwUCjwY5EI6wahruNf0jAgWDmn91XTbvwZREowWA.jpg';
        $contacto->imagenSecundaria_low='public/imagenContactoSecundaria/1607457181_9dLlpoCzuqOaV7bnQYu1a69ZzP2aPMu7XdD00r8cTwUCjwY5EI6wahruNf0jAgWDmn91XTbvwZREowWALowres.jpg';

        $contacto->save();

    }
}

