<template>
  <MainLayout>
    <div class="min-h-screen bg-gray-50 py-16 text-gray-800">
      <div class="max-w-5xl mx-auto px-6">
        <!-- Header -->
        <div class="text-center mb-12">
          <h1 class="text-3xl md:text-4xl font-bold text-green-700 mb-3">
            Lokasi Toko
          </h1>
          <p class="text-gray-600">
            Kunjungi kami langsung untuk mendapatkan jamur segar berkualitas
          </p>
        </div>

        <!-- Content -->
        <div class="grid md:grid-cols-2 gap-10 items-start">
          <!-- Info Lokasi -->
          <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">
              HSM Jamur
            </h2>

            <ul class="space-y-3 text-gray-700">
              <li>
                <strong>Alamat:</strong><br />
                Pasar Induk Cikopo<br />
                Blok D2 No. 96
              </li>
              <li>
                <strong>Kota:</strong> Purwakarta, Jawa Barat
              </li>
              <li>
                <strong>Jam Operasional:</strong><br />
                Setiap hari, 04.00 – 16.00 WIB
              </li>
            </ul>

            <a
              href="https://www.google.com/maps/search/?api=1&query=Pasar+Induk+Cikopo+Blok+D2+No+96"
              target="_blank"
              class="inline-block mt-6 bg-green-700 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-800 transition"
            >
              Buka di Google Maps
            </a>
          </div>

          <!-- Map -->
          <div class="w-full h-[350px] rounded-2xl overflow-hidden shadow-md">
            <iframe
              class="w-full h-full border-0"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              src="https://www.google.com/maps?q=Pasar%20Induk%20Cikopo%20Blok%20D2%20No.%2096&output=embed"
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue'
import { onMounted } from 'vue'

onMounted(() => {
  document.title = 'Lokasi Toko – HSM Jamur'
})
</script>

<style scoped>
h1,
h2 {
  font-family: 'Poppins', sans-serif;
}
</style>
