<template>
	<div class="row">
		<div class="col-12 mt-3">
			<div class="row">
				<div class="col-12">
					<div class="position-relative">
						<div
							class="background-image-maker py-5"
							style="background-image: url(&quot;/storage/images/defaults/cover.jpg&quot;);"
						></div>
						<div class="holder-image">
							<img src="/storage/images/defaults/cover.jpg" alt class="img-fluid d-none" />
						</div>
						<div class="position-relative px-3 py-5">
							<div class="media d-md-flex d-block">
								<div class="media-body z-index-1">
									<div class="pl-4">
										<h1 class="display-4 text-uppercase text-white mb-0">{{profile_name}}</h1>
										<h6 class="text-uppercase text-white mb-0">{{profile_role}}</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="profile-menu mt-3 theme-background border z-index-1 p-2">
				<div class="d-sm-flex">
					<div class="align-self-center">
						<ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
							<li class="nav-item ml-0">
								<a class="nav-link py-2 px-3 px-lg-4 active" data-toggle="tab" href="#salary">Salary Details</a>
							</li>
							<li class="nav-item ml-0">
								<a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#leave">Leave Details</a>
							</li>
							<li class="nav-item ml-0">
								<a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#activities">Activities</a>
							</li>
							<li class="nav-item ml-0 mb-2 mb-sm-0">
								<a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#settings">Settings</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="tab-content">
				<div role="tabpanel" id="salary" class="tab-pane active">
					<div class="card mt-3">
						<div class="card-body">
							<h3>Salary</h3>
						</div>
					</div>
				</div>
				<div role="tabpanel" id="activities" class="tab-pane">
					<div class="card mt-3">
						<div class="card-body">
							<h3>Activities</h3>
						</div>
					</div>
				</div>
				<div role="tabpanel" id="leave" class="tab-pane">
					<div class="card mt-3">
						<div class="card-body">
							<h3>Leave</h3>
						</div>
					</div>
				</div>
				<div role="tabpanel" id="settings" class="tab-pane">
					<div class="card mt-3">
						<div class="card-body">
							<div class="row mt-4 portfolio-box">
								<div class="col-md-6 post mb-4">
									<div class="border">
										<div class="card-body pb-0">
											<div class="media mb-3">
												<a @click="updateProfilePicture">
													<img :src="profile_pic" alt class="img-fluid rounded-circle d-flex mr-3" />
												</a>
											</div>

											<div id="demo" class="collapse show">
												<div class="clearfix my-2">
													<div class="float-sm-right float-none">
														<small>
															<a @click="updateProfilePicture" class="font-weight-bold">
																<i class="fa fa-pen mx-1"></i> Change Profile Picture (600px X 600px Recommended)
															</a>
														</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6 post mb-4">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Update Account Settings</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<form method="POST" @submit.prevent="updateAccountSettings">
														<div class="form-row">
															<div class="col-md-12 mb-3">
																<label for="validationCustomEmail">Email</label>
																<div class="input-group">
																	<div class="input-group-prepend">
																		<span class="input-group-text">@</span>
																	</div>
																	<input
																		type="text"
																		class="form-control"
																		id="validationCustomEmail"
																		placeholder="Email"
																		:class="{ 'is-invalid': form.errors.has('email') }"
																		v-model="form.email"
																	/>
																	<has-error :form="form" field="email"></has-error>
																</div>
															</div>
														</div>

														<div class="form-row">
															<div class="col-md-6 mb-3">
																<label for="validationCustomPassword">New Password</label>
																<div class="input-group">
																	<input
																		type="password"
																		class="form-control"
																		placeholder="Password"
																		:class="{ 'is-invalid': form.errors.has('password') }"
																		v-model="form.password"
																	/>
																	<has-error :form="form" field="password"></has-error>
																</div>
															</div>

															<div class="col-md-6 mb-3">
																<label for="validationCustomPassword">Confirm New Password</label>
																<div class="input-group">
																	<input
																		type="password"
																		class="form-control"
																		placeholder="Password"
																		:class="{ 'is-invalid': form.errors.has('password_confirmation') }"
																		v-model="form.password_confirmation"
																	/>
																	<has-error :form="form" field="password_confirmation"></has-error>
																</div>
															</div>
														</div>

														<div class="form-row">
															<div class="col-md-6 mb-3">
																<label for="validationCustomPassword">Current Password</label>
																<div class="input-group">
																	<input
																		type="password"
																		class="form-control"
																		placeholder="Current Password"
																		:class="{ 'is-invalid': form.errors.has('current_password') }"
																		v-model="form.current_password"
																	/>
																	<has-error :form="form" field="current_password"></has-error>
																</div>
															</div>
														</div>

														<button
															class="btn btn-primary mt-2"
															:disabled="submit_disabled"
															type="submit"
														>Update Account Settings</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: [],
	created() {
		this.getProfileDetails();
		Fire.$on('profile_pic_updated' , () => {
			this.getProfileDetails();
		});
	},
	mounted() {
		console.log("Component mounted.");
	},
	data() {
		return {
			submit_disabled: false,

			my_profile: {},
			profile_pic: "",
			profile_name: "",
			profile_role: "",
			profile_email: "",

			form: new Form({
				username: "",
				email: "",
				current_password: "",
				password: null,
				password_confirmation: null,
			}),

			up_image: new Form({
				photo: {
					name: "",
					file: "",
				},
			}),
		};
	},
	methods: {
		getProfileDetails: async function () {
			try {
				const response = await axios.get("/api/user/profile");
				if ((response.status = 200)) {
					this.my_profile = response.data;

					this.profile_pic = this.my_profile.photo.path;
					this.profile_name = this.my_profile.user.username;
					this.profile_role = this.my_profile.role;
					this.form.email = this.my_profile.user.email;
					this.form.username = this.my_profile.user.username;
				}
			} catch (error) {
				console.log(error);
			}
		},
		updateAccountSettings: async function () {
			try {
				this.submit_disabled = true;
				const response = await this.form.patch(
					"/api/user/" + this.my_profile.user.id
				);
				if (response.status == 200) {
					Toast.fire({
						icon: "success",
						title: response.data.message,
					}).then(() => {
						this.form.reset();
						this.getProfileDetails();
						this.submit_disabled = false;
					});
				}
			} catch (error) {
				this.submit_disabled = false;
				Toast.fire({
					icon: "error",
					title: error.response.data.message,
				});
			}
		},
		updateProfilePicture: async function () {
			const { value: file } = await swal.fire({
				title: "Select image",
				input: "file",
				inputAttributes: {
					accept: "image/*",
					"aria-label": "Upload your profile picture",
				},
			});

			if (file) {
				this.up_image.photo.name = file.name;
				const reader = new FileReader();
				reader.onloadend = (e) => {
					this.up_image.photo.file = reader.result;
					setTimeout(() => {
						this.up_image
							.patch(
								"/api/user/update/profile/picture/" + this.my_profile.user.id
							)
							.then((response) => {
								if (response.status == 200) {
									Toast.fire({
										icon: "success",
										title: response.data.message,
									});

									Fire.$emit('profile_pic_updated');
								}
							})
							.catch((error) => {
								console.log(error);
							});
					}, 1000);
				};
				reader.readAsDataURL(file);
			}
		},
	},
};
</script>
