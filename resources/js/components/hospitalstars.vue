<template>
 <div>
      <p class="text-3xl">
       <span :class="[preview.star>=1? 'gold':'text-gray-300']">★</span>
       <span :class="[preview.star>=2? 'gold':'text-gray-300']">★</span>
       <span :class="[preview.star>=3? 'gold':'text-gray-300']">★</span>
       <span :class="[preview.star>=4? 'gold':'text-gray-300']">★</span>
       <span :class="[preview.star==5? 'gold':'text-gray-300']">★</span>
      </p>
 </div>  
</template>
<script>
 export default {
  props:['hospitalId'],
  data(){
   return{
     rate:0
   }
  },
  mounted(){
    axios.get('/hospital/averagerate',{params:{hospitalId:this.hospitalId}})
    .then(res=>{
      this.rate=res.data.rate;
      const starTotal = 5; 
      const starPercentage = (this.rate / starTotal) * 100;
      const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
      document.querySelector('p').style.width = starPercentageRounded;
    });
    }
 } 
</script>
<style scoped>
.stars-outer {
  display: inline-block;
  position: relative;
  font-size:2rem;
}
.stars-outer::before {
  content: "\f006 \f006 \f006 \f006 \f006";
  color:#D3D3D3;
  font-size:2rem;
}
.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
  font-size:2rem;
}
.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  color:#ffd700;
  font-size:2rem;
}
</style>