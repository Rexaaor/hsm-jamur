<template>
  <MainLayout>
    <div class="min-h-screen bg-gray-50">
      <!-- Highlight Section -->
      <section class="produk-bg text-white">
        <div class="bg-black bg-opacity-60 py-16">
          <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6" data-aos="fade-up">
              Kualitas yang Tak Tertandingi
            </h2>
            <p
              class="max-w-2xl mx-auto mb-10 opacity-90"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              Setiap jamur kami ditanam secara alami tanpa bahan kimia berbahaya,
              dipanen setiap hari untuk memastikan kesegaran maksimal.
            </p>
          </div>
        </div>
      </section>

      <!-- Filter & Category -->
      <section class="py-10 bg-white border-b">
        <div
          class="container mx-auto px-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4"
        >
          <div class="flex items-center gap-4" data-aos="fade-right">
            <span class="font-semibold text-gray-700">Kategori:</span>
            <div class="flex gap-3">
              <button
                class="px-4 py-2 bg-green-700 text-white rounded-full hover:bg-green-800 transition"
              >
                Semua
              </button>
            </div>
          </div>

          <div data-aos="fade-left">
            <input
              v-model="search"
              type="text"
              placeholder="Cari produk..."
              class="border border-gray-300 rounded-full px-4 py-2 w-full md:w-64 
         focus:ring-2 focus:ring-green-500 outline-none
         text-gray-800 placeholder-gray-500"
            />
          </div>
        </div>
      </section>

      <!-- Product Grid -->
        <section class="py-16 bg-gray-50">
          <div class="container mx-auto px-6">
            <div
              v-if="filteredProducts.length"
              class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10"
            >
              <div
                v-for="(product, i) in filteredProducts"
                :key="product.id"
                class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col"
                data-aos="fade-up"
                :data-aos-delay="i * 100"
              >
                <!-- Gambar -->
                <div class="relative">
                  <img
                    :src="product.image"
                    :alt="product.name"
                    class="w-full h-56 object-cover"
                  />
                  <div
                    v-if="product.tag"
                    class="absolute top-3 left-3 bg-green-600 text-white text-sm px-3 py-1 rounded-full shadow"
                  >
                    {{ product.tag }}
                  </div>
                </div>

                <!-- Isi Card -->
                <div class="p-6 flex flex-col h-full">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    {{ product.name }}
                  </h3>

                  <p class="text-gray-600 mb-4">
                    {{ product.description }}
                  </p>

                  <!-- Didorong ke bawah -->
                  <div class="mt-auto flex justify-between items-center pt-4">
                    <div class="flex flex-col">
                      <span class="text-lg font-semibold text-green-700">
                        {{ formatRupiah(product.harga) }}
                      </span>
                      <span class="text-xs text-gray-500 italic">
                        *Harga dapat berubah, konfirmasi via WhatsApp
                      </span>
                    </div>


                    <a
                      :href="`/produk/${product.id}`"
                      class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition text-center"
                    >
                      Lihat Detail
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div v-else class="text-center text-gray-600 py-20">
              Produk tidak ditemukan.
            </div>
          </div>
        </section>


      <!-- CTA -->
      <section class="py-16 bg-green-800 text-white">
        <div class="container mx-auto px-6 text-center">
          <h2 class="text-3xl font-bold mb-6" data-aos="fade-up">
            Siap Memesan Produk Kami?
          </h2>
          <p
            class="text-xl mb-8 max-w-2xl mx-auto opacity-90"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            Hubungi tim kami untuk pemesanan grosir atau eceran — kami siap
            melayani dengan kualitas terbaik.
          </p>
          <a
            href="#"
            @click.prevent="goToWhatsApp('produk_list')"
            class="bg-white text-green-800 font-bold px-8 py-4 rounded-full hover:bg-gray-100 transition duration-300"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            Hubungi Sekarang
          </a>

        </div>
      </section>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue'
import { ref, computed, onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'
import axios from 'axios'

const page = usePage()
const waNumber = computed(() => page.props.wa_number)

const { props } = usePage()
const products = ref(props.products || [])
const search = ref('')

const filteredProducts = computed(() => {
  if (!search.value.trim()) {
    return products.value
  }
  return products.value.filter(p =>
    p.name.toLowerCase().includes(search.value.toLowerCase())
  )
})

const goToWhatsApp = async (sourcePage = 'produk_list', productId = null) => {
  try {
    await axios.post('/click-log', {
      source_page: sourcePage,
      product_id: productId,
    })
  } catch (e) {
    console.error('Click log failed', e)
  } finally {
    const phone = waNumber.value?.replace(/^0/, '62')
    const text = encodeURIComponent(
      'Halo, saya ingin bertanya mengenai produk jamur'
    )

    window.open(`https://wa.me/${phone}?text=${text}`, '_blank')
  }
}


onMounted(() => {
  if (window.AOS) window.AOS.init({ duration: 800, easing: 'ease-in-out', once: true, offset: 60  })
  if (window.feather) window.feather.replace()
})

const formatRupiah = (value) => {
  if (!value) return '-'
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
  }).format(value)
}

</script>

<style scoped>
.produk-bg {
  background-image: url('http://static.photos/food/1200x630/108');
  background-size: cover;
  background-position: center;
}
</style>
