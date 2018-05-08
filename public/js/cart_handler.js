var app = new Vue({

	el: '#root',

    data:{
	    items: [
	      { price: 230.99, title: 'RayBan', description: 'RayBan pilot style brownish blacked poloryzed sunglasses', imgSrc: 'images/rayban.jpg' },
	      { price: 125.23, title: 'Gucci', description: 'Golden sneakers mens shoes', imgSrc: 'images/gucci_shoes.jpg' },
	      { price: 620.96, title: 'Ralf Lauren', description: 'Haircalf Ricky Chain BagHaircalf Ricky Chain Bag', imgSrc: 'images/ralf_lauren.jpg' },
	      { price: 880.89, title: 'iPhone', description: 'Original Apple iPhone 7/7 Plus 2GB RAM 32/128GB/256GB IOS 10', imgSrc: 'images/iphon7.jpg' },
	      { price: 999, title: 'HUBLOT', description: 'Hublot Big Bang Rose Gold Ceramic Bezel 44 mm 301.PM.1780.RX', imgSrc: 'images/hublot.jpg' },
	      { price: 799.95, title: 'Sharp', description: 'Sharp LC-75N8000U Bundle 75" Class (74.5" diag.) AQUOS 4K Ultra HD Smart TV', imgSrc: 'images/sharp-tv.png' },
	    ],
	    cartItems: 0,
	    cartPrice: 0,
	    itemsResponse: []
    },

	components: {

		'add-to-cart': {

		    template: 
		    	`<div id="buttons">
			    	<button :title="title" type="button" @click="addToCart" class="btn btn-success">Add To Cart</button>
		    	</div>
		    	`
		    ,

		    props: ['item'],

		    data: function () {
		        return {
		            title: 'Add item to your Cart Collection',
		            title_delete: 'Delete from your Cart Collection', 
		        }
		    },

			methods: {

				addToCart(){

					let vue = this.$parent;
					vue.cartItems++;
					vue.cartPrice += this.item.price; 
					console.log(this.item)

                    axios({
                        method: 'POST',
                        url: 'http://localhost/MVC/public/home/store',
                        data: {
                            item: this.item
                        },
                    })
                    .then(function(response){
                        // sever handle data
                    })
                    .catch(function(error){
                        console.log(error);
                    });
				},				

			}

		},

		'remove-item': {

		    template: 
				`<button @click="RemoveItems" type="button" class="btn btn-link btn">
					<i class="fas fa-trash-alt"></i>
				</button>
		    	`
		    ,

		    props: ['item','index'],

			methods: {

				RemoveItems(){
					
					let vue = this.$parent;
					var id = this.$el.id;
					var index = this.index;
					if(vue.cartItems > 0 && vue.cartPrice > 0){
						vue.cartItems--;
						vue.cartPrice -= this.item.price;	
						//Math.abs(this.$parent.cartPrice)					
					}

                    axios({
                        method: 'DELETE',
                        url: 'http://localhost/MVC/public/checkout/delete/' + id,
                    })
                    .then(function(response){

	                    vue.itemsResponse.splice(index, 1);                     
                    })
                    .catch(function(error){
                        console.log(error);
                    });
				},			
			}	
		},		

		'pay-now': {

		    template: 
				`<b-btn type="button" @click="resetItems" class="btn btn-success btn-block" v-b-modal.modal-center>Pay Now</b-btn>
		    	`
		    ,

			methods: {

				resetItems(){

					let vue = this.$parent;
					if(vue.itemsResponse.length > 0){

	                    axios({
	                        method: 'DELETE',
	                        url: 'http://localhost/MVC/public/checkout/reset/' ,
	                    })
	                    .then(function(response){

		                    vue.itemsResponse = [];   
		                    vue.cartItems = 0;                  
		                    vue.cartPrice = 0;     		                    	                                 
	                    })
	                    .catch(function(error){
	                        console.log(error);
	                    });

                	}
				},			
			}	
		}

	},

	created: function () {
       
        let vue = this;
        axios.get('http://localhost/MVC/public/home/update')
            .then(function(response){
            	vue.itemsResponse = response.data;
                vue.cartItems = response.data.length;
	            response.data.forEach(function(data, key){              
	                vue.cartPrice += parseFloat(data.price);
	            });  
	                          
            })
        
            .catch(function(error){
                console.log(error);
            });  

	}

})