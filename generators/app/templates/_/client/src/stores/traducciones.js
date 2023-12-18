import {ref} from 'vue';
import {defineStore} from 'pinia';
import {useIdiomaStore} from '@/stores/idioma';

export const useTraduccionesStore = defineStore('traducciones', () => {
  const idioma = useIdiomaStore();
  //------------------------------------------------
  const txt = ref({
    header:
        {
          es: {
            txt1: 'ES',
            txt2: 'EN',
            txt3: 'active',
            txt4: '',
          },
          en: {
            txt1: 'ES',
            txt2: 'EN',
            txt3: '',
            txt4: 'active',
          },
        },
    footer:
        {
          es: {
            txt1: 'Beyond AI,  embracing humanity ©',
          },
          en: {
            txt1: 'Beyond AI,  embracing humanity ©',
          },
        },
    componente1:
        {
          es: {
            txt1: 'Beyond <span class="s1">Ai</span>,<br/>embracing <span class="s2">humanity</span>',
            txt2: 'Nuestro Motor Empático elimina las barreras tecnológicas adaptando la tecnología a la humanidad, no al revés.',
          },
          en: {
            txt1: 'Beyond <span class="s1">Ai</span>,<br/>embracing <span class="s2">humanity</span>',
            txt2: 'Our Empathic Engine Eliminates Barriers adapting technology to the humanity, not the other way around.',
          },
        },
    componente2:
        {
          es: {
            txt1: 'Presentando...',
            txt2: 'Bienvenido a AiMA, donde la empatía se encuentra con la innovación. Experimenta la tecnología con corazón. Únete a nosotros en un mundo donde las conexiones van más allá de las palabras. Tú habla, sonríe, comunica. AiMA te comprende.',
          },
          en: {
            txt1: 'Introducing...',
            txt2: 'Welcome to AiMA, where empathy meets innovation. Experience technology with heart. Join us in a world where connections go beyond words. You talk, you smile, you communicate. AiMA understands you.',
          },
        },
    componente3:
        {
          es: {
            txt1: 'Tecnología,<br/>pero <span class="s2">Humanidad</span>',
            txt2: 'La tecnología debe encarnar la esencia de la humanidad. Creada para humanos, simplificando lo imposible y haciéndolo intuitivo y natural. Porque la verdadera innovación reside en el espectro infinito de matices que nos define como humanos.',
            txt3: 'Empatia',
            txt4: 'Estamos aquí para reflejar el calor, el cuidado y las respuestas empáticas de una persona.',
            txt5: 'Inteligencia',
            txt6: 'AiMA no requiere que te ajustes ni aprendas como usarla. Se adapta a ti sin ningún esfuerzo.',
            txt7: 'Memoria',
            txt8: 'La memoria es la esencia de nuestro viaje humano. AiMA recuerda pasadas, nombres, rostros e imágenes cómo lo haces tú.',
          },
          en: {
            txt1: 'Technology,<br/>but <span class="s2">Humanity</span>',
            txt2: 'Technology must embody the essence of humanity. Created for humans, simplifying the impossible and making it intuitive and natural. Because true innovation lies in the infinite spectrum of nuances that we defined as human.',
            txt3: 'Empathy',
            txt4: 'We\'re here to reflect warmth, care, and empathic responses from a person.',
            txt5: 'Intelligence',
            txt6: 'AiMA doesn\'t require you to adjust or learn how to use it. Herself Adapts to you effortlessly.',
            txt7: 'Memory',
            txt8: 'Memory is the essence of our journey human. AiMA remembers pasts, names, faces and images how you do it.',
          },
        },
    componente4:
        {
          es: {
            txt1: 'Únete al <span class="s2">futuro</span>',
            txt2: '¿Listo para el próximo gran salto en la evolución humano-tecnológica? Únete a la lista de espera de la beta y sé parte del grupo exclusivo que está moldeando el futuro de las conexiones humano-tecnología. ¡No te lo pierdas! ¡Regístrate ahora y forma parte de esta revolución!',
            txt3: 'Email',
            txt4: 'Únete a la Waitlist',
            txt5: '¡Gracias!',
          },
          en: {
            txt1: 'Join the <span class="s2">future</span>',
            txt2: 'Ready for the next big leap in human-tech evolution? Join the beta waitlist and be part of the exclusive group shaping the future of human-tech connections. Don\'t miss your chance—sign up now and be at the forefront of this revolution!',
            txt3: 'Email',
            txt4: 'Join the Waitlist',
            txt5: '¡Thanks!',
          },
        },
  });

  function getTextos(section) {
    return txt.value[section][idioma.idioma];
  }

  return {
    getTextos,
  };
});
