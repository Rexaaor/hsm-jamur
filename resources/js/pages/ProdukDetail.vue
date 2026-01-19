<template>
  <MainLayout>
    <div
      :class="`min-h-screen bg-gradient-to-b ${product.details.warna}`"
      class="transition-all duration-700 ease-in-out"
    >
      <!-- Header Visual -->
      <section class="relative h-[360px] overflow-hidden">
        <img
          :src="product.image"
          :alt="product.name"
          class="absolute w-full h-full object-cover brightness-75 scale-105"
        />
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <div
          class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6"
        >
          <h1 class="text-4xl md:text-5xl font-extrabold drop-shadow-md mb-3">
            {{ product.name }}
          </h1>
          <p class="text-lg opacity-90 max-w-2xl">
            {{ product.details.deskripsi }}
          </p>
        </div>
      </section>

      <!-- Detail Content -->
      <section
        class="container mx-auto px-6 py-16 grid md:grid-cols-2 gap-12 items-start"
      >
        <!-- Left Column -->
        <div data-aos="fade-right">
          <h2 class="text-2xl font-bold text-green-800 mb-4">
            Informasi Produk
          </h2>
          <ul class="space-y-2 text-gray-700">
            <li>
              <strong>Nama Ilmiah:</strong>
              <i>{{ product.details.latin }}</i>
            </li>
            <li><strong>Keluarga:</strong> {{ product.details.keluarga }}</li>
            <li>
              <strong>Harga:</strong>
              Rp {{ Number(product.price).toLocaleString('id-ID') }}/kg
            </li>
          </ul>

          <h3 class="text-xl font-semibold text-green-800 mt-8 mb-2">
            Kandungan Gizi
          </h3>
          <p class="text-gray-700 leading-relaxed">
            {{ product.details.nutrisi }}
          </p>

          <h3 class="text-xl font-semibold text-green-800 mt-8 mb-2">
            Contoh Penggunaan
          </h3>
          <p class="text-gray-700 leading-relaxed">
            {{ product.details.penggunaan }}
          </p>

          <!-- Tombol CTA -->
          <a
            :href="`https://wa.me/6282116666603?text=Halo,%20saya%20ingin%20memesan%20${encodeURIComponent(product.name)}`"
            target="_blank"
            class="inline-block mt-8 bg-green-700 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-800 transition shadow-md"
          >
            Pesan via WhatsApp
          </a>
        </div>

        <!-- Right Column -->
        <div
          class="flex flex-col justify-center items-center space-y-6"
          data-aos="fade-left"
        >
          <div
            class="rounded-2xl overflow-hidden shadow-xl w-full max-w-md transition-transform hover:scale-[1.02]"
          >
            <img
              :src="product.image"
              :alt="product.name"
              class="w-full h-80 object-cover"
            />
          </div>

          <!-- Mini Gallery -->
          <div class="grid grid-cols-3 gap-4 w-full max-w-md">
            <img
              v-for="(img, i) in product.details.gallery"
              :key="i"
              :src="img"
              class="rounded-xl h-28 object-cover shadow hover:scale-105 transition"
            />
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

const { props } = usePage()
const product = props.product

onMounted(() => {
  if (window.AOS)
    window.AOS.init({ duration: 800, easing: 'ease-in-out', once: true })
  document.title = `${product.name} – HSM Mushroom`
})
</script>

<style scoped>
h1,
h2,
h3 {
  font-family: 'Poppins', sans-serif;
}
</style>
