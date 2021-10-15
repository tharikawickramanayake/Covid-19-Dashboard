<template>
	<div class="col-lg-12">
		<div class="row">
			<div class="col-12 mt-3">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="card-title">Edit Permission Name</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<form method="POST" @submit.prevent="updatePermission">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>User type name</label>
											<input
												type="text"
												class="form-control rounded"
												:class="{ 'is-invalid': form.errors.has('name') }"
												v-model="form.name"
												placeholder="Example: Manager"
											/>
											<has-error :form="form" field="name"></has-error>
										</div>
									</div>
									<button :disabled="submit_disabled" type="submit" class="btn btn-primary">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 mt-3">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="card-title">Select Permissions For The Role</h4>
					</div>
					<div class="card-body">
						<h5 class="card-title">Role Permission Overview</h5>
						<div class="row pt-3">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table class="table table-bordered table-hover table-condensed mb-4">
										<thead>
											<tr>
												<th width="50%">Permission Group</th>
												<th width="10%" class="text-center">Create</th>
												<th width="10%" class="text-center">View</th>
												<th width="10%" class="text-center">Update</th>
												<th width="10%" class="text-center">Delete</th>
												<th width="10%" class="text-center">All</th>
											</tr>
										</thead>
										<tbody>
											<tr id="user_mgt">
												<td>All Permissions</td>
												<td id="create" class="text-center"></td>
												<td id="view" class="text-center"></td>
												<td id="update" class="text-center"></td>
												<td id="delete" class="text-center"></td>
												<td id="all" class="text-center">
													<div class="n-chk">
														<label class="new-control new-checkbox checkbox-primary">
															<input
																type="checkbox"
																v-model="grant_all"
																@change="allCheckHandler"
																class="new-control-input"
															/>
														</label>
													</div>
												</td>
											</tr>
											<tr v-for="(permission, index) in permissions" :key="index">
												<td>{{permission.data.name}}</td>
												<td class="text-center">
													<div class="n-chk">
														<label class="new-control new-checkbox checkbox-primary">
															<input
																type="checkbox"
																class="new-control-input"
																v-model="permission.permissions.create"
																@change="checkArrayForAll(permission)"
															/>
															<!---->
														</label>
													</div>
												</td>
												<td class="text-center">
													<div class="n-chk">
														<label class="new-control new-checkbox checkbox-primary">
															<input
																type="checkbox"
																class="new-control-input"
																v-model="permission.permissions.view"
																@change="checkArrayForAll(permission)"
															/>
															<!---->
														</label>
													</div>
												</td>
												<td class="text-center">
													<div class="n-chk">
														<label class="new-control new-checkbox checkbox-primary">
															<input
																type="checkbox"
																class="new-control-input"
																v-model="permission.permissions.update"
																@change="checkArrayForAll(permission)"
															/>
															<!---->
														</label>
													</div>
												</td>
												<td class="text-center">
													<div class="n-chk">
														<label class="new-control new-checkbox checkbox-primary">
															<input
																type="checkbox"
																class="new-control-input"
																v-model="permission.permissions.delete"
																@change="checkArrayForAll(permission)"
															/>
															<!---->
														</label>
													</div>
												</td>
												<td class="text-center">
													<div class="n-chk">
														<label class="new-control new-checkbox checkbox-primary">
															<!---->
															<input
																type="checkbox"
																class="new-control-input"
																@change="changeArrayValues(permission.permissions, permission.data.all) ; checkArrayForAll(permission)"
																v-model="permission.data.all"
															/>
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<button
							@click="updatePermission"
							:disabled="submit_disabled"
							type="button"
							class="btn btn-primary"
						>Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ["role"],
	created() {
		this.form.name = this.role.name;
	},
	mounted() {
		this.getPreviousPermissions();		
	},
	data() {
		return {
			form: new Form({
				name: "",
				permissions: {},
			}),

			submit_disabled: false,

			grant_all: false,

			no_prev_permissions: 0,

			permissions: {
				user: {
					data: {
						all: false,
						name: "User Management",
						phrase: "user_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				customer: {
					data: {
						all: false,
						name: "Customer Management",
						phrase: "customer_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				guarantor: {
					data: {
						all: false,
						name: "Guarantor Management",
						phrase: "guarantor_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				route: {
					data: {
						all: false,
						name: "Route Management",
						phrase: "route_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				loan: {
					data: {
						all: false,
						name: "Loan Management",
						phrase: "loan_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				payment: {
					data: {
						all: false,
						name: "Payment Management",
						phrase: "payment_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				payroll: {
					data: {
						all: false,
						name: "Payroll Management",
						phrase: "payroll_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				expense: {
					data: {
						all: false,
						name: "Expense Management",
						phrase: "expense_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				income: {
					data: {
						all: false,
						name: "Income Management",
						phrase: "income_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				investment: {
					data: {
						all: false,
						name: "Investment Management",
						phrase: "investment_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
				report: {
					data: {
						all: false,
						name: "Report Generation",
						phrase: "report_management_",
					},
					permissions: {
						create: false,
						view: false,
						update: false,
						delete: false,
					},
				},
			},
		};
	},
	methods: {
		getPreviousPermissions: async function () {
			try {
				const response = await axios.get("/api/role/" + this.role.id);
				const prev_permissions = response.data.permissions;

				let no_permission = 0;

				for (let i in prev_permissions) {
					let name = prev_permissions[i].name;
					let slug = name.split("_"); //Spliting to identify the permission [0]name [2]permission				

					this.no_prev_permissions ++ ;

					let key = slug[0];
					let value = slug[2];

					this.permissions[key].permissions[value] = true;

					if (
						this.permissions[key].permissions.create == true &&
						this.permissions[key].permissions.view == true &&
						this.permissions[key].permissions.update == true &&
						this.permissions[key].permissions.delete == true
					) {
						this.permissions[key].data.all = true;
					}

					
				}

				this.comparePermissionArrayToCheckAll();

			} catch (error) {
				console.log(error);
			}
		},
		updatePermission: async function () {
			try {
				Toast.fire({
					icon: "info",
					title: "Please wait!",
				});
				this.submit_disabled = true;
				this.form.permissions = this.permissions;
				const response = await this.form.patch("/api/role/" + this.role.id);
				if (response.status == 200) {
					Toast.fire({
						icon: "success",
						title: response.data.message,
					}).then(() => {
						this.submit_disabled = false;
						window.location.href = "/permission";
					});
				}
			} catch (e) {
				let errors = e.response.data.errors;
				let myerror = "";
				for (let i in errors) {
					myerror += " " + errors[i];
				}
				console.log(myerror);
				Toast.fire({
					icon: "error",
					title: myerror,
				});
			}
		},
		changeArrayValues: function (array, value) {
			for (let i in array) {
				array[i] = value;
			}
		},
		allCheckHandler: function () {
			for (let i in this.permissions) {
				for (let j in this.permissions[i].permissions) {
					this.permissions[i].permissions[j] = this.grant_all;
				}
				this.permissions[i].data.all = this.grant_all;
			}
		},
		checkArrayForAll: function (array) {
			if (
				array.permissions.create == true &&
				array.permissions.view == true &&
				array.permissions.update == true &&
				array.permissions.delete == true
			) {
				array.data.all = true;
			}else{
				array.data.all = false;
				this.grant_all = false;
			}

			this.comparePermissionArrayToCheckAll();
		},
		comparePermissionArrayToCheckAll: function () {

			let no_permission_objects = 0;
			let available_permission = 0;

			for(let i in this.permissions){
				for(let j in this.permissions[i].permissions){

					no_permission_objects ++ ;
					if(this.permissions[i].permissions[j] == true){
						available_permission ++ ;
					}
				}
			}

			if(no_permission_objects == available_permission ){
				this.grant_all = true;
			}else{
				this.grant_all =  false;
			}

		
		}
	},
};
</script>
