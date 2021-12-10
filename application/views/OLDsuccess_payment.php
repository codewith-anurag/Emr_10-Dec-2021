<style type="text/css">
	.swal-modal {
		border-radius: 15px;
	}
	.swal-icon--success__line {
		background-color: #150aec;
	}
	.swal-icon--success__ring {
		border: 4px solid hsla(242.9, 91.9%, 48.2%, 0.21);
	}
	.swal-title {
		color: #150aec;
	}
	.swal-button-container {
		position: relative;
		text-align: center;
		margin: 0 auto;
		margin-bottom: 25px;
		display: block;
	}
	.swal-button:not([disabled]):hover {
		background-color: #150aec;
color: #fff;
	}
	.swal-button {
		border: 1px solid #150aec;
		background: transparent;
		color: #150aec;
		border-radius: 0px;
	}
	.swal-button:focus {
		outline: none;
		box-shadow: none;
    	border: 1px solid #150aec !important;
	}


</style>
<?php  $patient_ID =  $this->uri->segment(3);  ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

	swal("Thank You!", "Your Payment Done Successfully!", "success").then(function() {
    window.location = "<?php echo base_url('item_master/auto_login/'.$patient_ID);?>";
});;
		
</script>
