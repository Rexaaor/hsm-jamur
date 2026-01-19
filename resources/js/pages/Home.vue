<template>

  <MainLayout>

    <div class="min-h-screen bg-gray-50">

      <section class="hero-gradient text-white">

        <div class="container mx-auto px-6 py-24 md:py-32">

          <div class="flex flex-col md:flex-row items-center">

            <div class="md:w-1/2 mb-12 md:mb-0" data-aos="fade-right">

              <h1 class="text-4xl md:text-5xl font-bold mb-6">Budidaya Jamur Premium</h1>

              <p class="text-xl mb-8 opacity-90">Segar, alami, dan penuh gizi langsung dari tangan kami.</p>

              <div class="flex space-x-4">

                <a href="/produk" class="bg-white text-green-800 px-6 py-3 rounded-full font-medium hover:bg-gray-100 transition duration-300">Belanja Sekarang</a>

                <a href="#about" class="border-2 border-white px-6 py-3 rounded-full font-medium hover:bg-white hover:text-green-800 transition duration-300">Learn More</a>

              </div>

            </div>

            <div class="md:w-1/2" data-aos="fade-left">

              <img :src="heroImage" alt="Hero Image Farm" class="rounded-lg shadow-xl w-full h-96 object-cover" />

            </div>

          </div>

        </div>

      </section>



      <section class="py-16 bg-white">

        <div class="container mx-auto px-6">

          <div class="text-center mb-16" data-aos="fade-up">

            <h2 class="text-3xl font-bold text-gray-800 mb-4">Macam Macam Jamur</h2>

            <p class="text-gray-600 max-w-2xl mx-auto">Temukan jamur premium dari budidaya kami langsung.</p>

          </div>



          <div class="flex justify-center">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl">

              <div v-for="product in products" :key="product.id" 

                   class="bg-gray-50 rounded-xl p-6 mushroom-card transition duration-300" 

                   data-aos="fade-up">

                <div class="bg-green-100 rounded-lg p-4 mb-4 flex justify-center">

                  <img :src="product.image" :alt="product.name" class="h-40 object-contain">

                </div>

                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ product.name }}</h3>

                <p class="text-gray-600 mb-4">{{ product.description }}</p>

                <a :href="`/produk/${product.id}`" 

                   class="block text-center w-full bg-green-700 text-white py-2 rounded-lg hover:bg-green-800 transition duration-300">

                   View Details

                </a>

              </div>

            </div>

          </div>

        </div>

      </section>



      <section id="about" class="py-16 bg-gray-100">

        <div class="container mx-auto px-6">

          <div class="flex flex-col md:flex-row items-center">

            <div class="md:w-1/2 mb-12 md:mb-0" data-aos="fade-right">

              <img :src="aboutImage" alt="About Farm" class="rounded-lg shadow-lg w-full h-80 object-cover" />

            </div>

            <div class="md:w-1/2 md:pl-12" data-aos="fade-left">

              <h2 class="text-3xl font-bold text-gray-800 mb-6">Budidaya Berkelanjutan</h2>

              <p class="text-gray-600 mb-6">Di HSM Jamur, kami memadukan teknik budidaya tradisional dengan praktik berkelanjutan modern.</p>

              <ul class="space-y-4 mb-8">

                <li v-for="item in features" :key="item" class="flex items-start">

                  <i data-feather="check-circle" class="text-green-600 w-5 h-5 mt-1 mr-3"></i>

                  <span class="text-gray-700">{{ item }}</span>

                </li>

              </ul>

              <button class="bg-green-700 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-800 transition duration-300">Pelajari lebih lanjut</button>

            </div>

          </div>

        </div>

      </section>

<!-- CTA -->

    <section class="py-16 bg-green-800 text-white">

      <div class="container mx-auto px-6 text-center">

        <h2 class="text-3xl font-bold mb-6" data-aos="fade-up">Ready to Experience Premium Mushrooms?</h2>

        <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90" data-aos="fade-up" data-aos-delay="100">Bergabunglah dengan Ribuan Pelanggan Puas yang Menikmati Jamur Terbaik Kami.</p>

        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4" data-aos="fade-up" data-aos-delay="200">

          <a href="/shop" class="bg-white text-green-800 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition duration-300">Belanja produk kami</a>

          <a href="https://wa.me/6282116666603?text=Halo,%20Saya%20Ingin%20Bertanya%20Mengenai%20Jamur" target="_blank" class="border-2 border-white px-8 py-4 rounded-full font-bold hover:bg-white hover:text-green-800 transition duration-300">Kontak Kami</a>

        </div>

      </div>

    </section>



      </div>

  </MainLayout>

</template>



<script setup>

import MainLayout from '@/layouts/MainLayout.vue'

import { onMounted } from 'vue'

import { usePage } from '@inertiajs/vue3'



// Ambil data dari props yang dikirim Controller

const { props } = usePage()

const products = props.products

const heroImage = props.heroImage

const aboutImage = props.aboutImage



const features = [

  '100% Budidaya alami',

  'Tanpa Pestisida',

  'Dipetik setiap hari',

  'Kualitas Premium'

]



onMounted(() => {

  if (window.AOS) {

    window.AOS.init({ duration: 800, easing: 'ease-in-out', once: true })

  }

  if (window.feather) {

    window.feather.replace()

  }

})

</script>



<style scoped>

.hero-gradient {

  background: linear-gradient(135deg, #4a7c59 0%, #3a5a40 100%);

}

.mushroom-card:hover {

  transform: translateY(-5px);

  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);

}

.mushroom-bg {

  background-image: url('http://static.photos/nature/1200x630/42');

  background-size: cover;

  background-position: center;

}

</style>