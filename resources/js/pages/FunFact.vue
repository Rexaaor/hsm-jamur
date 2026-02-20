<template>
  <MainLayout>
    <div class="min-h-screen bg-gradient-to-b from-green-50 to-white py-16 text-gray-800">
      <div class="max-w-5xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-14">
          <h1 class="text-3xl md:text-4xl font-bold text-green-700 mb-4">
            Fun Fact Seputar Jamur
          </h1>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Tahukah kamu? Jamur bukan hanya lezat, tapi juga menyimpan banyak fakta unik
            yang jarang diketahui orang.
          </p>
        </div>

        <!-- Fun Fact List -->
        <div class="space-y-10">

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              1. Jamur Bukan Tumbuhan
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Meskipun sering dianggap sebagai sayuran, jamur sebenarnya bukan termasuk
              tumbuhan. Jamur berada dalam kingdom Fungi, berbeda dengan tumbuhan yang
              berada di kingdom Plantae. Jamur tidak memiliki klorofil sehingga tidak
              dapat melakukan fotosintesis seperti tumbuhan.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              2. Jamur Lebih Dekat ke Hewan daripada Tumbuhan
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Secara biologis, jamur justru lebih dekat ke hewan dibanding tumbuhan.
              Hal ini karena dinding sel jamur tersusun dari kitin, zat yang juga ditemukan
              pada eksoskeleton serangga dan cangkang udang.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              3. Jamur Tiram Mengandung Protein Tinggi
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Jamur tiram dikenal sebagai sumber protein nabati yang baik. Kandungan
              proteinnya cukup tinggi dan rendah lemak, sehingga cocok untuk pola makan
              sehat, vegetarian, maupun program diet.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              4. Jamur Bisa Membantu Menurunkan Kolesterol
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Beberapa jenis jamur, termasuk jamur tiram, mengandung senyawa beta-glukan
              yang dipercaya dapat membantu menurunkan kadar kolesterol jahat (LDL)
              dalam tubuh.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              5. Jamur Tumbuh Tanpa Tanah
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Berbeda dengan tanaman, jamur tidak membutuhkan tanah untuk tumbuh.
              Jamur tiram biasanya dibudidayakan menggunakan media serbuk kayu,
              jerami, atau limbah pertanian yang difermentasi.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              6. Jamur Sudah Dikonsumsi Sejak Ribuan Tahun Lalu
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Sejarah mencatat bahwa jamur telah dikonsumsi manusia sejak ribuan tahun
              yang lalu. Di beberapa budaya kuno, jamur bahkan dianggap sebagai makanan
              para bangsawan dan simbol umur panjang.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              7. Jamur Sangat Cepat Tumbuh
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Beberapa jenis jamur dapat tumbuh sangat cepat. Dalam kondisi ideal,
              jamur tiram bisa dipanen hanya dalam waktu beberapa hari setelah muncul
              dari media tanamnya.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              8. Jamur Mendukung Ketahanan Pangan
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Budidaya jamur dinilai ramah lingkungan dan mendukung ketahanan pangan
              karena dapat memanfaatkan limbah organik serta membutuhkan lahan yang
              relatif kecil.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              9. Jamur Bisa Diolah Menjadi Banyak Produk
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Selain dimasak sebagai lauk, jamur juga dapat diolah menjadi berbagai
              produk seperti jamur crispy, bakso jamur, nugget jamur, hingga abon jamur.
              Rasanya lezat dan bernilai jual tinggi.
            </p>
          </div>

          <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-xl font-semibold text-green-800 mb-3">
              10. Jamur Segar Paling Baik Dikonsumsi Secepatnya
            </h2>
            <p class="text-gray-700 leading-relaxed">
              Jamur segar memiliki kadar air tinggi sehingga sebaiknya dikonsumsi
              dalam waktu singkat agar kualitas dan kandungan gizinya tetap terjaga.
              Penyimpanan di suhu dingin dapat membantu memperpanjang kesegarannya.
            </p>
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
  document.title = 'Fun Fact – HSM Jamur'
})
</script>

<style scoped>
h1,
h2 {
  font-family: 'Poppins', sans-serif;
}
</style>
