<template>
  <MainLayout>
    <div class="min-h-screen bg-gray-50">
    <section class="bg-gray-50 text-gray-800 overflow-hidden">

      <!-- Story Section -->
      <div class="max-w-6xl mx-auto px-6 py-20 text-center">
        <h2 class="text-3xl font-semibold text-green-800 mb-6">Mengenal Lebih Dekat Dunia Jamur</h2>
        <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
          Farm tour kami dirancang untuk membawa Anda menyelami perjalanan jamur tiram dari awal hingga akhir.
          Tidak hanya melihat prosesnya, tetapi juga memahami filosofi kami:
          menanam dengan hati, merawat dengan ilmu, dan panen dengan kebanggaan.
        </p>
      </div>

      <!-- Section 1: Pembibitan -->
      <div class="grid md:grid-cols-2 items-center gap-10 px-6 md:px-16 py-16 bg-white">
        <img
          src="http://static.photos/agriculture/1200x630/167"
          alt="Proses pembibitan jamur tiram"
          class="rounded-2xl shadow-lg object-cover"
        >
        <div>
          <h3 class="text-2xl font-semibold text-green-800 mb-4">1. Pembibitan Unggul</h3>
          <p class="text-gray-600 leading-relaxed">
            Perjalanan dimulai di ruang steril tempat kami menyiapkan bibit jamur unggulan.
            Proses dilakukan dengan pengawasan ketat agar kualitas dan hasil produksi terjaga sempurna.
          </p>
        </div>
      </div>

      <!-- Section 2: Inkubasi -->
      <div class="grid md:grid-cols-2 items-center gap-10 px-6 md:px-16 py-16 bg-gray-100">
        <div class="order-2 md:order-1">
          <h3 class="text-2xl font-semibold text-green-800 mb-4">2. Inkubasi & Pertumbuhan</h3>
          <p class="text-gray-600 leading-relaxed">
            Di tahap ini, baglog jamur disimpan di ruang inkubasi dengan suhu dan kelembapan yang dikontrol secara cermat.
            Dalam hitungan minggu, serabut miselium tumbuh dan menyelimuti media dengan sempurna.
          </p>
        </div>
        <img
          src="http://static.photos/agriculture/1200x630/158"
          alt="Ruang inkubasi jamur"
          class="rounded-2xl shadow-lg object-cover order-1"
        >
      </div>

      <!-- Section 3: Panen -->
      <div class="grid md:grid-cols-2 items-center gap-10 px-6 md:px-16 py-16 bg-white">
        <img
          src="http://static.photos/agriculture/1200x630/200"
          alt="Panen jamur tiram"
          class="rounded-2xl shadow-lg object-cover"
        >
        <div>
          <h3 class="text-2xl font-semibold text-green-800 mb-4">3. Panen Setiap Hari</h3>
          <p class="text-gray-600 leading-relaxed">
            Setiap pagi, tim kami memanen jamur tiram segar — putih bersih dan tebal.
            Kami memastikan setiap produk dikirim langsung ke pelanggan dalam kondisi terbaik dan paling segar.
          </p>
        </div>
      </div>
    </section>
    <!-- CTA Section -->
    <section class="py-16 bg-green-800 text-white">
      <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-4">Ayo Jadwalkan Kunjungan!</h2>
        <p class="mb-8 text-lg text-gray-200 max-w-2xl mx-auto">
          Bergabunglah bersama kami untuk wisata edukasi di kebun sehat & alami!
        </p>
        <a
          href="https://wa.me/6282116666603?text=Halo,%20Saya%20Ingin%20Farm%20Tour%20Jamur"
          target="_blank"
          class="bg-white text-green-800 font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-gray-200 transition"
        >
          Hubungi via WhatsApp
        </a>
      </div>
    </section>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue'
import { Link } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
const { props } = usePage()
const farmTours = props.farmTours

</script>
