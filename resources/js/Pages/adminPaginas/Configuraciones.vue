<template>
	<v-app class="fondo">
		<v-snackbar top right v-model="Exito" timeout="3000" color="green lighten-1">
			Operacion Exitosa.
		</v-snackbar>
		<v-snackbar top right v-model="Fallido" timeout="3000" color="red lighten-1">
			Operacion Fallida.
		</v-snackbar>
		<v-container>
			<v-tabs v-model="tab" color="black" fixed-tabs background-color="transparent" slider-color="black">
            	<v-tab>Home</v-tab>
				<v-tab>Individuales</v-tab>
				<v-tab>Historias</v-tab>
				<v-tab>Proyectos</v-tab>
				<v-tab>Viajes</v-tab>
				<v-tab>Sobre Mi</v-tab>
				<v-tab>Contacto</v-tab>
				<v-tab>Fuentes</v-tab>
			<v-tabs-items v-model="tab">
				<v-tab-item align="center" justify="center"> 
						<v-col cols="12" xs="12" sm="12" md="12" lg="12" style="color:#161e2e;">
							<div class="mt-5">
								<h3 class="text-lg-h6 text-center">Actualizar Página Principal</h3>
								<p class="text-sm-body-2 text-center">Podras realizar las modificaciones necesarias para la visualización de su página principal.</p>
							</div>
							<v-card :elevation="7" :disabled="dishome" color="white">
								<v-row class="px-2" v-for="item in home" :key="item.id">
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<span style="color:#161e2e;">{{item.txt}}</span>
									</v-col>
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<div v-if="item.id === '1'">
											<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="home[0].img"></v-file-input>
										</div>
										<div v-else>
											<div v-if="item.id === '2'">
												<editormodulo @guardarEditor="guardarEditorMetodo" id="home" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="2"></editormodulo>
											</div>
											<div v-else>
												<colorpicker @guardarColor="cambiarColorHome" :id="item.id"></colorpicker>
												<div :style="item.muestracolor"></div>
											</div>
										</div>
									</v-col>
								</v-row>
								<v-row justify="center" align="center">
									<v-btn dark class="ma-2" :loading="dishome" color='#4b924e' @click="actualizarHome"> Actualizar</v-btn>
								</v-row>
							</v-card>
						</v-col>
				</v-tab-item>
				<v-tab-item align="center" justify="center">
						<v-col cols="12" xs="12" sm="12" md="12" lg="12" style="color:#161e2e;">
							<div class="mt-5">
								<h3 class="text-lg-h6 text-center">Actualizar Página Individuales</h3>
								<p class="text-sm-body-2 text-center">Podras realizar las modificaciones necesarias para la visualización de la sub galeria individuales.</p>
							</div>
							<v-card :elevation="7" :disabled="disindividuales" color="white">
								<v-row class="px-2" v-for="item in individuales" :key="item.id">
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<span style="color:#161e2e;">{{item.txt}}</span>
									</v-col>
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<div v-if="item.id === '1'">
											<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="individuales[0].img"></v-file-input>
										</div>
										<div v-else>
											<div v-if="item.id === '2'">
												<editormodulo @guardarEditor="guardarEditorMetodo" id="individuales" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="2"></editormodulo>
											</div>
											<div v-else>
												<div v-if="item.id === '7'">
													<editormodulo @guardarEditor="guardarEditorMetodo" id="individuales" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="7"></editormodulo>
												</div>
												<div v-else>
													<colorpicker @guardarColor="cambiarColorIndividuales" :id="item.id"></colorpicker>
													<div :style="item.muestracolor"></div>
												</div>
											</div>
										</div>
									</v-col>
								</v-row>
								<v-row justify="center" align="center">
									<v-btn :loading="disindividuales" dark class="ma-2" color='#4b924e' @click="actualizarIndividuales"> Actualizar</v-btn>
								</v-row>
							</v-card>
						</v-col>
				</v-tab-item>
				<v-tab-item align="center" justify="center">
						<v-col cols="12" xs="12" sm="12" md="12" lg="12" style="color:#161e2e;">
							<div class="mt-5">
								<h3 class="text-lg-h6 text-center">Actualizar Página Historias</h3>
								<p class="text-sm-body-2 text-center">Podras realizar las modificaciones necesarias para la visualización de la sub galeria historias.</p>
							</div>
							<v-card :elevation="7" :disabled="dishistorias" color="white">
								<v-row class="px-2" v-for="item in historias" :key="item.id">
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<span style="color:#161e2e;">{{item.txt}}</span>
									</v-col>
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<div v-if="item.id === '1'">
											<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="historias[0].img"></v-file-input>
										</div>
										<div v-else>
											<div v-if="item.id === '2'">
												<editormodulo @guardarEditor="guardarEditorMetodo" id="historias" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="2"></editormodulo>
											</div>
											<div v-else>
												<div v-if="item.id === '7'">
													<editormodulo @guardarEditor="guardarEditorMetodo" id="historias" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="7"></editormodulo>
												</div>
												<div v-else>
													<colorpicker @guardarColor="cambiarColorHistorias" :id="item.id"></colorpicker>
													<div :style="item.muestracolor"></div>
												</div>
											</div>
										</div>
									</v-col>
								</v-row>
								<v-row justify="center" align="center">
									<v-btn :loading="dishistorias" dark class="ma-2" color='#4b924e' @click="actualizarHistorias"> Actualizar</v-btn>
								</v-row>
							</v-card>
						</v-col>
				</v-tab-item>
				<v-tab-item align="center" justify="center">
						<v-col cols="12" xs="12" sm="12" md="12" lg="12" style="color:#161e2e;">
							<div class="mt-5">
								<h3 class="text-lg-h6 text-center">Actualizar Página Proyectos</h3>
								<p class="text-sm-body-2 text-center">Podras realizar las modificaciones necesarias para la visualización de la sub galeria proyectos.</p>
							</div>
							<v-card :elevation="7" :disabled="disproyectos" color="white">
								<v-row class="px-2" v-for="item in proyectos" :key="item.id">
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<span style="color:#161e2e;">{{item.txt}}</span>
									</v-col>
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<div v-if="item.id === '1'">
											<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="proyectos[0].img"></v-file-input>
										</div>
										<div v-else>
											<div v-if="item.id === '2'">
												<editormodulo @guardarEditor="guardarEditorMetodo" id="proyectos" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="2"></editormodulo>
											</div>
											<div v-else>
												<div v-if="item.id === '7'">
													<editormodulo @guardarEditor="guardarEditorMetodo" id="proyectos" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="7"></editormodulo>
												</div>
												<div v-else>
													<colorpicker @guardarColor="cambiarColorProyectos" :id="item.id"></colorpicker>
													<div :style="item.muestracolor"></div>
												</div>
											</div>
										</div>
									</v-col>
								</v-row>
								<v-row justify="center" align="center">
									<v-btn :loading="disproyectos" dark class="ma-2" color='#4b924e' @click="actualizarProyectos"> Actualizar</v-btn>
								</v-row>
							</v-card>
						</v-col>
				</v-tab-item>
				<v-tab-item align="center" justify="center">
						<v-col cols="12" xs="12" sm="12" md="12" lg="12" style="color:#161e2e;">
							<div class="mt-5">
								<h3 class="text-lg-h6 text-center">Actualizar Página Viajes</h3>
								<p class="text-sm-body-2 text-center">Podras realizar las modificaciones necesarias para la visualización de la sub galeria viajes.</p>
							</div>
							<v-card :elevation="7" :disabled="disviajes" color="white">
								<v-row class="px-2" v-for="item in viajes" :key="item.id">
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<span style="color:#161e2e;">{{item.txt}}</span>
									</v-col>
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<div v-if="item.id === '1'">
											<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="viajes[0].img"></v-file-input>
										</div>
										<div v-else>
											<div v-if="item.id === '2'">
												<editormodulo @guardarEditor="guardarEditorMetodo" id="viajes" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="2"></editormodulo>
											</div>
											<div v-else>
												<div v-if="item.id === '7'">
													<editormodulo @guardarEditor="guardarEditorMetodo" id="viajes" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="7"></editormodulo>
												</div>
												<div v-else>
													<colorpicker @guardarColor="cambiarColorViajes" :id="item.id"></colorpicker>
													<div :style="item.muestracolor"></div>
												</div>
											</div>
										</div>
									</v-col>
								</v-row>
								<v-row justify="center" align="center">
									<v-btn :loading="disviajes" dark class="ma-2" color='#4b924e' @click="actualizarViajes"> Actualizar</v-btn>
								</v-row>
							</v-card>
						</v-col>
				</v-tab-item>
				<v-tab-item align="center" justify="center">
						<v-col cols="12" xs="12" sm="12" md="12" lg="12" style="color:#161e2e;">
							<div class="mt-5">
								<h3 class="text-lg-h6 text-center">Actualizar Página Sobre Mi</h3>
								<p class="text-sm-body-2 text-center">Podras realizar las modificaciones necesarias para la visualización de la sección sobre mi.</p>
							</div>
							<v-card :elevation="7" :disabled="dissobremi" color="white">
								<v-row class="px-2" v-for="item in sobremi" :key="item.id">
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<span style="color:#161e2e;">{{item.txt}}</span>
									</v-col>
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<div v-if="item.id === '1'">
											<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="sobremi[0].img"></v-file-input>
										</div>
										<div v-else>
											<div v-if="item.id === '2'">
												<editormodulo @guardarEditor="guardarEditorMetodo" id="sobremi" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="2"></editormodulo>
											</div>
											<div v-else>
												<div v-if="item.id === '7'">
													<editormodulo @guardarEditor="guardarEditorMetodo" id="sobremi" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="7"></editormodulo>
												</div>
												<div v-else>
													<div v-if="item.id === '8'">
														<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="sobremi[7].img"></v-file-input>
													</div>
													<div v-else>
														<colorpicker @guardarColor="cambiarColorSobremi" :id="item.id"></colorpicker>
														<div :style="item.muestracolor"></div>
													</div>
												</div>
											</div>
										</div>
									</v-col>
								</v-row>
								<v-row justify="center" align="center">
									<v-btn :loading="dissobremi" dark class="ma-2" color='#4b924e' @click="actualizarSobremi"> Actualizar</v-btn>
								</v-row>
							</v-card>
						</v-col>
				</v-tab-item>
				<v-tab-item align="center" justify="center">
						<v-col cols="12" xs="12" sm="12" md="12" lg="12" style="color:#161e2e;">
							<div class="mt-5">
								<h3 class="text-lg-h6 text-center">Actualizar Página Contacto</h3>
								<p class="text-sm-body-2 text-center">Podras realizar las modificaciones necesarias para la visualización de la sección contacto.</p>
							</div>
							<v-card :elevation="7" :disabled="discontacto" color="white">
								<v-row class="px-2" v-for="item in contacto" :key="item.id">
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<span style="color:#161e2e;">{{item.txt}}</span>
									</v-col>
									<v-col cols="12" xs="12" sm="6" md="6" lg="6" justify="center" align="center">
										<div v-if="item.id === '1'">
											<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="contacto[0].img"></v-file-input>
										</div>
										<div v-else>
											<div v-if="item.id === '2'">
												<editormodulo @guardarEditor="guardarEditorMetodo" id="contacto" :fuentes="fuentesstr" :habilitarmodal="habilitarmodulosmodal" :tipo="2"></editormodulo>
											</div>
											<div v-else>
													<div v-if="item.id === '8'">
														<v-file-input accept="image/*" light label="File input" filled prepend-icon="mdi-camera" v-model="contacto[7].img"></v-file-input>
													</div>
													<div v-else>
														<colorpicker @guardarColor="cambiarColorContacto" :id="item.id"></colorpicker>
														<div :style="item.muestracolor"></div>
													</div>
												</div>
											</div>
									</v-col>
								</v-row>
								<v-row justify="center" align="center">
									<v-btn :loading="discontacto" dark class="ma-2" color='#4b924e' @click="actualizarContacto"> Actualizar</v-btn>
								</v-row>
							</v-card>
						</v-col>
				</v-tab-item>

				<v-tab-item align="center" justify="center">
						<v-col cols="12" xs="12" sm="12" md="12" lg="12" style="color:#161e2e;">
							<div class="mt-5">
								<h3 class="text-lg-h6 text-center">Fuentes de Google</h3>
								<p class="text-sm-body-2 text-center">Administra las fuentes de <a href="https://fonts.google.com/">Google Fonts</a> que vas a utilizar en la pagina web</p>
							</div>
							<v-card :elevation="7" color="white">
								<v-row class="mt-8 d-flex justify-center">
									<p style="font-size:x-large;">Agregar una Fuente</p>
								</v-row>

								<div class="d-flex flex-row justify-center">
									<v-col cols="12" sm="7">
										<v-text-field ref="nombrefuente" :rules="[v => !!v || 'Ingresar nombre de la fuente.']" label="Nombre de la Fuente:" v-model="nom" required></v-text-field>
									</v-col>
								</div>

								<div class="mt-n7 d-flex flex-row justify-center">
									<v-col cols="12" sm="7">
										<v-text-field ref="valorfuente" :rules="[value => !!value || 'Ingresar un valor.']" type="number" label="Intensidad:" v-model="inten" required></v-text-field>
									</v-col>
								</div>

								<div class="mb-7 d-flex justify-center">
									<v-tooltip right v-model="mensaje">
										<template v-slot:activator="mensaje">
											<v-btn class="boton-fuentes" dark color='#4b924e' :loading="desactivarboton" :disabled="!((nom.length > 0)&&(inten.length > 0))" @click="consultaGoogleFonts"> Instalar </v-btn>
										</template>
										<span>{{ texto }}</span>
									</v-tooltip>
								</div>



							<p class="mb-0 ml-10">Fuentes instaladas</p>
							<v-card outlined class="ml-5 mr-5" >
								<v-virtual-scroll :items="listafuentes" height="300" item-height="64">
									<template v-slot="{ item }">
										<v-list-item :key="item.id">
											<v-list-item-content>
												<v-list-item-title>
													<div class="d-flex justify-space-around align-center">
														{{ item.nombre }}
														<v-btn @click="borrarFuente( item.id )" icon color="#ff5252">
															<v-icon>mdi-trash-can</v-icon>
														</v-btn>
													</div>

												</v-list-item-title>
											</v-list-item-content>
										</v-list-item>
										<v-divider></v-divider>
									</template>
								</v-virtual-scroll>
							</v-card>
						</v-card>
						</v-col>
				</v-tab-item>
			</v-tabs-items>
			</v-tabs>
		</v-container>


	</v-app>
</template>


<script>
  import Layout from '../administrador'

  export default {
	layout: (h, page) => h(Layout, [page]),
	props:['config'],
	data: () => ({
		Exito:false,
		Fallido:false,
		dishome:false,
		disindividuales:false,
		dishistorias:false,
		disproyectos:false,
		disviajes:false,
		dissobremi:false,
		discontacto:false,
		habilitarmodulosmodal:false,
		nom:'',
		mensaje:false,
		desactivarboton:false,
		texto:'',
		inten:'',
		listafuentes:[],
		fuentesstr:[],
		tab: null,
        home: [
			{ id:'1', txt: 'Imagen Página Principal',img:null },
			{ id:'2', txt: 'Editar fuente y color de texto de Pagina Principal',txtData:'' },
			{ id:'3', txt: 'Color de texto en la Barra de Navegación',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'4', txt: 'Color de iconos de redes sociales',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'5', txt: 'Color del boton Mas Info',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'6', txt: 'Color del texto del boton Mas Info',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'7', txt: 'Color de barra de navegación lateral móvil',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'8', txt: 'Color de texto de la barra de navegación lateral móvil',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
		],
		individuales: [
			{ id:'1', txt: 'Imagen de fondo Individuales',img:null },
			{id: '2', txt: 'Editar fuente y color de texto de la Pagina',txtData:''},
			{id: '3', txt: 'Color del texto de la Barra de Navegación',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '4', txt: 'Color de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '5', txt: 'Color del texto de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '6', txt: 'Color del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '7', txt: 'Editar fuente y color del texto del cuerpo',txtData:''},
			{id: '8', txt: 'Color del divisor de seccion del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'9', txt: 'Color de la barra de navegación lateral móvil',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'10', txt: 'Color del texto de la barra de navegación lateral móvil',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'11', txt: 'Color del botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'12', txt: 'Color del texto botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'13', txt: 'Color de animacion de carga',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
		],
		historias: [
			{ id:'1', txt: 'Imagen de fondo Individuales',img:null },
			{id: '2', txt: 'Editar fuente y color de texto de la Pagina',txtData:''},
			{id: '3', txt: 'Color del texto de la Barra de Navegación',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '4', txt: 'Color de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '5', txt: 'Color del texto de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '6', txt: 'Color del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '7', txt: 'Editar fuente y color del texto del cuerpo',txtData:''},
			{id: '8', txt: 'Color del divisor de seccion del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'9', txt: 'Color de la barra de navegación lateral móvil',color:'' ,muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'10', txt: 'Color del texto de la barra de navegación lateral móvil',color:'' ,muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'11', txt: 'Color del botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'12', txt: 'Color del texto botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'13', txt: 'Color de animacion de carga',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
		],
		proyectos: [
			{ id:'1', txt: 'Imagen de fondo Individuales',img:null },
			{id: '2', txt: 'Editar fuente y color de texto de la Pagina',txtData:''},
			{id: '3', txt: 'Color del texto de la Barra de Navegación',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '4', txt: 'Color de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '5', txt: 'Color del texto de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '6', txt: 'Color del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '7', txt: 'Editar fuente y color del texto del cuerpo',txtData:''},
			{id: '8', txt: 'Color del divisor de seccion del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'9', txt: 'Color de la barra de navegación lateral móvil',color:'' ,muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'10', txt: 'Color del texto de la barra de navegación lateral móvil',color:'' ,muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'11', txt: 'Color del botón de navegación a buscador superior',color:'' ,muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'12', txt: 'Color del texto botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'13', txt: 'Color de animacion de carga',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
		],
		viajes: [
			{ id:'1', txt: 'Imagen de fondo Individuales',img:null },
			{id: '2', txt: 'Editar fuente y color de texto de la Pagina',txtData:''},
			{id: '3', txt: 'Color del texto de la Barra de Navegación',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '4', txt: 'Color de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '5', txt: 'Color del texto de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '6', txt: 'Color del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '7', txt: 'Editar fuente y color del texto del cuerpo',txtData:''},
			{id: '8', txt: 'Color del divisor de seccion del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'9', txt: 'Color de la barra de navegación lateral móvil',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'10', txt: 'Color del texto de la barra de navegación lateral móvil',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'11', txt: 'Color del botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'12', txt: 'Color del texto botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'13', txt: 'Color de animacion de carga',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
		],
		sobremi: [
			{ id:'1', txt: 'Imagen de fondo Individuales',img:null },
			{id: '2', txt: 'Editar fuente y color de texto de la Pagina',txtData:''},
			{id: '3', txt: 'Color del texto de la Barra de Navegación',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '4', txt: 'Color de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '5', txt: 'Color del texto de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '6', txt: 'Color del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '7', txt: 'Editar fuente y color del texto del cuerpo',txtData:''},
			{ id:'8', txt: 'Imagen de perfil para seccion sobre mi',img:null },
			{id: '9', txt: 'Color del divisor de seccion del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'10', txt: 'Color de la barra de navegación lateral móvil',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'11', txt: 'Color del texto de la barra de navegación lateral móvil',color:'' ,muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'12', txt: 'Color del botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'13', txt: 'Color del texto botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },

		],
		contacto: [
			{ id:'1', txt: 'Imagen de fondo Individuales',img:null },
			{id: '2', txt: 'Editar fuente y color de texto de la Pagina',txtData:''},
			{id: '3', txt: 'Color del texto de la Barra de Navegación',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '4', txt: 'Color de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '5', txt: 'Color del texto de la Barra Inferior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '6', txt: 'Color del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{id: '7', txt: 'Editar color del texto del cuerpo',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'8', txt: 'Imagen para acompañar formulario de contacto para seccion contacto',img:null },
			{id: '9', txt: 'Color del divisor de seccion del cuerpo de la pagina',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'10', txt: 'Color de la barra de navegación lateral móvil',color:'' ,muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",},
			{ id:'11', txt: 'Color del texto de la barra de navegación lateral móvil',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'12', txt: 'Color del botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },
			{ id:'13', txt: 'Color del texto botón de navegación a buscador superior',color:'',muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;", },

		],
	}),
	methods:{
		guardarEditorMetodo(id,data,tipo){
			console.log("guardar editor------------");
			console.log(id);
			console.log(data);
			console.log(tipo);

			if (id == "home"){
				this.home[1].txtData= data;
			}
			if (id == "individuales" && tipo == 2){
				this.individuales[1].txtData= data;
			}
			if (id == "individuales" && tipo == 7){
				this.individuales[6].txtData= data;
			}
			if (id == "historias" && tipo == 2){
				this.historias[1].txtData= data;
			}
			if (id == "historias" && tipo == 7){
				this.historias[6].txtData= data;
			}
			if (id == "proyectos" && tipo == 2){
				this.proyectos[1].txtData= data;
			}
			if (id == "proyectos" && tipo == 7){
				this.proyectos[6].txtData= data;
			}
			if (id == "viajes" && tipo == 2){
				this.viajes[1].txtData= data;
			}
			if (id == "viajes" && tipo == 7){
				this.viajes[6].txtData= data;
			}
			if (id == "sobremi" && tipo == 2){
				this.sobremi[1].txtData= data;
			}
			if (id == "sobremi" && tipo == 7){
				this.sobremi[6].txtData= data;
			}
			if (id == "contacto" && tipo == 2){
				this.contacto[1].txtData= data;
			}
		},
		cargarFuentes(){
			var WebFont = require('webfontloader');
			this.fuentesstr=[];
			for (var i = 0; i < this.listafuentes.length; i++) {

				this.fuentesstr.push(this.listafuentes[i].nombre);
				WebFont.load({
					google: {
						api: 'https://fonts.googleapis.com/css2',
						families: [ this.listafuentes[i].nombre ]
					},
				});
			}
			this.habilitarmodulosmodal=true;
			this.$root.$emit("fuentescargadas",this.fuentesstr);
		},
		borrarFuente(id){
				this.$root.$emit("iniciareventocargar");
				axios.post("/borrarFuente", {"id":id}).then( ( response ) => {
					this.$inertia.visit("configuraciones");
  			  });
		},
		bajarFuentes(){
			console.log("bajando fuentes");
			this.$root.$emit("iniciareventocargar");
			axios.post("/bajarFuentes").then( ( response ) => {
				this.listafuentes=response.data;
				this.cargarFuentes();
				this.$root.$emit("terminareventocargar");
		  	});
		},
		borrarmsj(){
			this.mensaje=false;
		},
		validarFuente(familyName){
			var valido=true;
			this.$root.$emit("iniciareventocargar");
			for (var i = 0; i < this.listafuentes.length; i++) {
				if(familyName.toLowerCase() == this.listafuentes[i].nombre.toLowerCase()){
					valido=false;
				}
			}
			if(valido){
				var fd;
	            fd = new FormData();
	            fd.set("nombre",familyName);
	            fd.set("intensidad",this.inten);
				fd.set("origen","google");

				axios.post("/subirFuente", fd).then( ( response ) => {
					this.$inertia.visit("configuraciones");
  			  });

			this.texto='fuente agregada!.';
			this.mensaje=true;
			this.desactivarboton=false;

			this.$refs.nombrefuente.reset();
			this.$refs.valorfuente.reset();
			this.inten='';
			this.nom='';

			setTimeout(this.borrarmsj, 2600);
		}else{this.yafueinst();}
		},
		yafueinst(){
				this.texto='ya fue instalada.';
				this.mensaje=true;
				this.desactivarboton=false;

				this.$refs.nombrefuente.reset();
				this.$refs.valorfuente.reset();
				this.inten='';
				this.nom='';

				setTimeout(this.borrarmsj, 2600);
				this.$root.$emit("terminareventocargar");
		},
		inactive(){
				this.texto='fuente invalida.';
				this.mensaje=true;
				this.desactivarboton=false;

				this.$refs.nombrefuente.reset();
				this.$refs.valorfuente.reset();
				this.inten='';
				this.nom='';

				setTimeout(this.borrarmsj, 2600);
				this.$root.$emit("terminareventocargar");
		},
		consultaGoogleFonts(){
			this.desactivarboton=true;
			var WebFont = require('webfontloader');

			WebFont.load({
    			google: {
					api: 'https://fonts.googleapis.com/css2',
      				families: [this.nom+':wght@'+this.inten]
    			},
				inactive: this.inactive
				,
				fontactive: this.validarFuente
  			});

		},
		cambiarColorHome(id,color){

			console.log(id);
			console.log(color);

			for (let i = 0; i < this.home.length; i++){
				console.log(this.home[i].id);
				if(this.home[i].id == id){
					this.home[i].color= color;
					this.home[i].muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+color+";"
				}

			}

		},
		cambiarColorIndividuales(id,color){
			console.log('individuales');
			console.log(id);
			console.log(color);

			for (let i = 0; i < this.individuales.length; i++){
				console.log(this.individuales[i].id);
				if(this.individuales[i].id == id){
					this.individuales[i].color= color;
					this.individuales[i].muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+color+";"
				}

			}

		},
		cambiarColorHistorias(id,color){

			console.log(id);
			console.log(color);

			for (let i = 0; i < this.historias.length; i++){
				console.log(this.historias[i].id);
				if(this.historias[i].id == id){
					this.historias[i].color= color;
					this.historias[i].muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+color+";"
				}

			}

		},
		cambiarColorProyectos(id,color){

			console.log(id);
			console.log(color);

			for (let i = 0; i < this.proyectos.length; i++){
				console.log(this.proyectos[i].id);
				if(this.proyectos[i].id == id){
					this.proyectos[i].color= color;
					this.proyectos[i].muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+color+";"
				}

			}

		},
		cambiarColorViajes(id,color){

			console.log(id);
			console.log(color);

			for (let i = 0; i < this.viajes.length; i++){
				console.log(this.viajes[i].id);
				if(this.viajes[i].id == id){
					this.viajes[i].color= color;
					this.viajes[i].muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+color+";"
				}

			}

		},
		cambiarColorSobremi(id,color){

			console.log(id);
			console.log(color);

			for (let i = 0; i < this.sobremi.length; i++){
				console.log(this.sobremi[i].id);
				if(this.sobremi[i].id == id){
					this.sobremi[i].color= color;
					this.sobremi[i].muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+color+";"
				}

			}

		},
		cambiarColorContacto(id,color){

			console.log(id);
			console.log(color);

			for (let i = 0; i < this.contacto.length; i++){
				console.log(this.contacto[i].id);
				if(this.contacto[i].id == id){
					this.contacto[i].color= color;
					this.contacto[i].muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+color+";"
				}

			}

		},
		actualizarHome(){
		 this.$root.$emit("iniciareventocargar");
		 this.dishome=true;
		var fd;
		  fd = new FormData();
		  fd.set("id", 1);
		  fd.set("textoPrincipal",this.home[1].txtData);
          fd.set("textoNavbar",this.home[2].color);
		  fd.set("colorRedes",this.home[3].color);

		  fd.set("colorBotonUp",this.home[4].color);
		  fd.set("textoBotonUp",this.home[5].color);

		  fd.set("colorNavM",this.home[6].color);
		  fd.set("textoNavM",this.home[7].color);
		  fd.append("imagenPrincipal", this.home[0].img);
		  axios.post('/admin/configuraciones', fd,{timeout:10000}).then((res) => {
			  this.Exito=true;
			  this.dishome=false;
			  this.$root.$emit("terminareventocargar");
		  }).catch((err) => {
			  console.log(err);
			  this.Fallido=true;
			  this.dishome=false;
			  this.$root.$emit("terminareventocargar");
		  })

		},
		actualizarIndividuales(){
		this.disindividuales=true;
		this.$root.$emit("iniciareventocargar");
		var fd;
		  fd = new FormData();
		  fd.set("id",2);
		  fd.set("textoPrincipal",this.individuales[1].txtData);
		  fd.set("textoNavbar",this.individuales[2].color);
		  fd.set("colorFooter",this.individuales[3].color);
		  fd.set("textoFooter",this.individuales[4].color);
		  fd.set("colorCuerpo",this.individuales[5].color);
		  fd.set("textoCuerpo",this.individuales[6].txtData);
		  fd.set("colorDiv",this.individuales[7].color);
		  fd.set("colorNavM",this.individuales[8].color);
		  fd.set("textoNavM",this.individuales[9].color);
		  fd.set("colorBotonUp",this.individuales[10].color);
		  fd.set("textoBotonUp",this.individuales[11].color);
		  fd.set("colorRedes",this.individuales[12].color);
		  fd.append("imagenPrincipal", this.individuales[0].img);
		  axios.post('/admin/configuraciones', fd,{timeout:10000}).then((res) => {
			  this.Exito=true;
			  this.disindividuales=false;
			  this.$root.$emit("terminareventocargar");
		  }).catch((err) => {
			  console.log(err);
			  this.Fallido=true;
			  this.disindividuales=false;
			  this.$root.$emit("terminareventocargar");
		  })

		},
		actualizarHistorias(){
		this.$root.$emit("iniciareventocargar");
		this.dishistorias=true;
		var fd;
		  fd = new FormData();
		  fd.set("id",3);
		  fd.set("textoPrincipal",this.historias[1].txtData);
		  fd.set("textoNavbar",this.historias[2].color);
		  fd.set("colorFooter",this.historias[3].color);
		  fd.set("textoFooter",this.historias[4].color);
		  fd.set("colorCuerpo",this.historias[5].color);
		  fd.set("textoCuerpo",this.historias[6].txtData);
		  fd.set("colorDiv",this.historias[7].color);
		  fd.set("colorNavM",this.historias[8].color);
		  fd.set("textoNavM",this.historias[9].color);
		  fd.set("colorBotonUp",this.historias[10].color);
		  fd.set("textoBotonUp",this.historias[11].color);
		  fd.set("colorRedes",this.historias[12].color);
		  fd.append("imagenPrincipal", this.historias[0].img);
		  axios.post('/admin/configuraciones', fd,{timeout:10000}).then((res) => {
			  this.Exito=true;
			  this.dishistorias=false;
			  this.$root.$emit("terminareventocargar");
		  }).catch((err) => {
			  console.log(err);
			  this.Fallido=true;
			  this.dishistorias=false;
			  this.$root.$emit("terminareventocargar");
		  })

		},
		actualizarProyectos(){
		this.$root.$emit("iniciareventocargar");
		this.disproyectos=true;
		  var fd;
		  fd = new FormData();
		  fd.set("id",4);
		  fd.set("textoPrincipal",this.proyectos[1].txtData);
		  fd.set("textoNavbar",this.proyectos[2].color);
		  fd.set("colorFooter",this.proyectos[3].color);
		  fd.set("textoFooter",this.proyectos[4].color);
		  fd.set("colorCuerpo",this.proyectos[5].color);
		  fd.set("textoCuerpo",this.proyectos[6].txtData);
		  fd.set("colorDiv",this.proyectos[7].color);
		  fd.set("colorNavM",this.proyectos[8].color);
		  fd.set("textoNavM",this.proyectos[9].color);
		  fd.set("colorBotonUp",this.proyectos[10].color);
		  fd.set("textoBotonUp",this.proyectos[11].color);
		  fd.set("colorRedes",this.proyectos[12].color);
		  fd.append("imagenPrincipal", this.proyectos[0].img);
		  axios.post('/admin/configuraciones', fd,{timeout:10000}).then((res) => {
			  this.Exito=true;
			  this.disproyectos=false;
			  this.$root.$emit("terminareventocargar");
		  }).catch((err) => {
			  console.log(err);
			  this.Fallido=true;
			  this.disproyectos=false;
			  this.$root.$emit("terminareventocargar");
		  })

		},
		actualizarViajes(){
		this.$root.$emit("iniciareventocargar");
		this.disviajes=true;
		var fd;
		  fd = new FormData();
		  fd.set("id",5);
		  fd.set("textoPrincipal",this.viajes[1].txtData);
		  fd.set("textoNavbar",this.viajes[2].color);
		  fd.set("colorFooter",this.viajes[3].color);
		  fd.set("textoFooter",this.viajes[4].color);
		  fd.set("colorCuerpo",this.viajes[5].color);
		  fd.set("textoCuerpo",this.viajes[6].txtData);
		  fd.set("colorDiv",this.viajes[7].color);
		  fd.set("colorNavM",this.viajes[8].color);
		  fd.set("textoNavM",this.viajes[9].color);
		  fd.set("colorBotonUp",this.viajes[10].color);
		  fd.set("textoBotonUp",this.viajes[11].color);
		  fd.set("colorRedes",this.viajes[12].color);
		  fd.append("imagenPrincipal", this.viajes[0].img);
		  axios.post('/admin/configuraciones', fd,{timeout:10000}).then((res) => {
			  this.Exito=true;
			  this.disviajes=false;
			  this.$root.$emit("terminareventocargar");
		  }).catch((err) => {
			  console.log(err);
			  this.Fallido=true;
			  this.disviajes=false;
			  this.$root.$emit("terminareventocargar");
		  })
		},
		actualizarSobremi(){
		this.$root.$emit("iniciareventocargar");
		this.dissobremi=true;
		var fd;
		  fd = new FormData();
		  fd.set("id",6);
		  fd.set("textoPrincipal",this.sobremi[1].txtData);
		  fd.set("textoNavbar",this.sobremi[2].color);
		  fd.set("colorFooter",this.sobremi[3].color);
		  fd.set("textoFooter",this.sobremi[4].color);
		  fd.set("colorCuerpo",this.sobremi[5].color);
		  fd.set("textoCuerpo",this.sobremi[6].txtData);
		  fd.append("imagenSecundaria", this.sobremi[7].img);
		  fd.set("colorDiv",this.sobremi[8].color);
		  fd.set("colorNavM",this.sobremi[9].color);
		  fd.set("textoNavM",this.sobremi[10].color);
		  fd.set("colorBotonUp",this.sobremi[11].color);
		  fd.set("textoBotonUp",this.sobremi[12].color);
		  fd.append("imagenPrincipal", this.sobremi[0].img);
		  axios.post('/admin/configuraciones', fd,{timeout:10000}).then((res) => {
			  this.Exito=true;
			  this.dissobremi=false;
			  this.$root.$emit("terminareventocargar");
		  }).catch((err) => {
			  console.log(err);
			  this.Fallido=true;
			  this.dissobremi=false;
			  this.$root.$emit("terminareventocargar");
		  })

		},
		actualizarContacto(){
		this.$root.$emit("iniciareventocargar");
		this.discontacto=true;
		var fd;
		  fd = new FormData();
		  fd.set("id",7);
		  fd.set("textoPrincipal",this.contacto[1].txtData);
		  fd.set("textoNavbar",this.contacto[2].color);
		  fd.set("colorFooter",this.contacto[3].color);
		  fd.set("textoFooter",this.contacto[4].color);
		  fd.set("colorCuerpo",this.contacto[5].color);
		  fd.set("textoCuerpo",this.contacto[6].color);
		  fd.append("imagenSecundaria", this.contacto[7].img);
		  fd.set("colorDiv",this.contacto[8].color);
		  fd.set("colorNavM",this.contacto[9].color);
		  fd.set("textoNavM",this.contacto[10].color);
		  fd.set("colorBotonUp",this.contacto[11].color);
		  fd.set("textoBotonUp",this.contacto[12].color);
		  fd.append("imagenPrincipal", this.contacto[0].img);
		  axios.post('/admin/configuraciones', fd,{timeout:10000}).then((res) => {
			  this.Exito=true;
			  this.discontacto=false;
			  this.$root.$emit("terminareventocargar");
		  }).catch((err) => {
			  console.log(err);
			  this.Fallido=true;
			  this.discontacto=false;
			  this.$root.$emit("terminareventocargar");
		  })

		},
	},
	mounted(){
		this.$root.$emit("terminareventocargar");
		this.bajarFuentes();
		this.home[0].color = this.$props.config[0].imagenPrincipal;
		this.home[1].txtData = this.$props.config[0].textoPrincipal;
		this.home[2].color = this.$props.config[0].textoNavbar;
		this.home[2].muestracolor= "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[0].textoNavbar+";"
		this.home[3].color = this.$props.config[0].colorRedes;
		this.home[3].muestracolor= "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[0].colorRedes+";"
		this.home[4].color = this.$props.config[0].colorBotonUp;
		this.home[4].muestracolor= "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[0].colorBotonUp+";"
		this.home[5].color = this.$props.config[0].textoBotonUp;
		this.home[5].muestracolor= "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[0].textoBotonUp+";"
		this.home[6].color = this.$props.config[0].colorNavM;
		this.home[6].muestracolor= "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[0].colorNavM+";"
		this.home[7].color = this.$props.config[0].textoNavM;
		this.home[7].muestracolor= "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[0].textoNavM+";"

		this.individuales[0].color = this.$props.config[1].imagenPrincipal;
		this.individuales[1].txtData = this.$props.config[1].textoPrincipal;
		this.individuales[2].color = this.$props.config[1].textoNavbar;
		this.individuales[2].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].textoNavbar+";"
		this.individuales[3].color = this.$props.config[1].colorFooter;
		this.individuales[3].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].colorFooter+";"
		this.individuales[4].color = this.$props.config[1].textoFooter;
		this.individuales[4].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].textoFooter+";"
		this.individuales[5].color = this.$props.config[1].colorCuerpo;
		this.individuales[5].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].colorCuerpo+";"
		this.individuales[6].txtData = this.$props.config[1].textoCuerpo;
		this.individuales[7].color = this.$props.config[1].colorDiv;
		this.individuales[7].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].colorDiv+";"
		this.individuales[8].color = this.$props.config[1].colorNavM;
		this.individuales[8].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].colorNavM+";"
		this.individuales[9].color = this.$props.config[1].textoNavM;
		this.individuales[9].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].textoNavM+";"
		this.individuales[10].color = this.$props.config[1].colorBotonUp;
		this.individuales[10].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].colorBotonUp+";"
		this.individuales[11].color = this.$props.config[1].textoBotonUp;
		this.individuales[11].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].textoBotonUp+";"
		this.individuales[12].color = this.$props.config[1].colorRedes;
		this.individuales[12].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[1].colorRedes+";"

		this.historias[0].color = this.$props.config[2].imagenPrincipal;
		this.historias[1].txtData = this.$props.config[2].textoPrincipal;
		this.historias[2].color = this.$props.config[2].textoNavbar;
		this.historias[2].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].textoNavbar+";"
		this.historias[3].color = this.$props.config[2].colorFooter;
		this.historias[3].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].colorFooter+";"
		this.historias[4].color = this.$props.config[2].textoFooter;
		this.historias[4].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].textoFooter+";"
		this.historias[5].color = this.$props.config[2].colorCuerpo;
		this.historias[5].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].colorCuerpo+";"
		this.historias[6].txtData = this.$props.config[2].textoCuerpo;
		this.historias[7].color = this.$props.config[2].colorDiv;
		this.historias[7].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].colorDiv+";"
		this.historias[8].color = this.$props.config[2].colorNavM;
		this.historias[8].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].colorNavM+";"
		this.historias[9].color = this.$props.config[2].textoNavM;
		this.historias[9].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].textoNavM+";"
		this.historias[10].color = this.$props.config[2].colorBotonUp;
		this.historias[10].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].colorBotonUp+";"
		this.historias[11].color = this.$props.config[2].textoBotonUp;
		this.historias[11].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].textoBotonUp+";"
		this.historias[12].color = this.$props.config[2].colorRedes;
		this.historias[12].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[2].colorRedes+";"


		this.proyectos[0].color = this.$props.config[3].imagenPrincipal;
		this.proyectos[1].txtData = this.$props.config[3].textoPrincipal;
		this.proyectos[2].color = this.$props.config[3].textoNavbar;
		this.proyectos[2].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].textoNavbar+";"
		this.proyectos[3].color = this.$props.config[3].colorFooter;
		this.proyectos[3].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].colorFooter+";"
		this.proyectos[4].color = this.$props.config[3].textoFooter;
		this.proyectos[4].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].textoFooter+";"
		this.proyectos[5].color = this.$props.config[3].colorCuerpo;
		this.proyectos[5].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].colorCuerpo+";"
		this.proyectos[6].txtData = this.$props.config[3].textoCuerpo;
		this.proyectos[7].color = this.$props.config[3].colorDiv;
		this.proyectos[7].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].colorDiv+";"
		this.proyectos[8].color = this.$props.config[3].colorNavM;
		this.proyectos[8].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].colorNavM+";"
		this.proyectos[9].color = this.$props.config[3].textoNavM;
		this.proyectos[9].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].textoNavM+";"
		this.proyectos[10].color = this.$props.config[3].colorBotonUp;
		this.proyectos[10].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].colorBotonUp+";"
		this.proyectos[11].color = this.$props.config[3].textoBotonUp;
		this.proyectos[11].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].textoBotonUp+";"
		this.proyectos[12].color = this.$props.config[3].colorRedes;
		this.proyectos[12].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[3].colorRedes+";"


		this.viajes[0].color = this.$props.config[4].imagenPrincipal;
		this.viajes[1].txtData = this.$props.config[4].textoPrincipal;
		this.viajes[2].color = this.$props.config[4].textoNavbar;
		this.viajes[2].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].textoNavbar+";"
		this.viajes[3].color = this.$props.config[4].colorFooter;
		this.viajes[3].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].colorFooter+";"
		this.viajes[4].color = this.$props.config[4].textoFooter;
		this.viajes[4].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].textoFooter+";"
		this.viajes[5].color = this.$props.config[4].colorCuerpo;
		this.viajes[5].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].colorCuerpo+";"
		this.viajes[6].txtData = this.$props.config[4].textoCuerpo;
		this.viajes[7].color = this.$props.config[4].colorDiv;
		this.viajes[7].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].colorDiv+";"
		this.viajes[8].color = this.$props.config[4].colorNavM;
		this.viajes[8].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].colorNavM+";"
		this.viajes[9].color = this.$props.config[4].textoNavM;
		this.viajes[9].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].textoNavM+";"
		this.viajes[10].color = this.$props.config[4].colorBotonUp;
		this.viajes[10].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].colorBotonUp+";"
		this.viajes[11].color = this.$props.config[4].textoBotonUp;
		this.viajes[11].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].textoBotonUp+";"
		this.viajes[12].color = this.$props.config[4].colorRedes;
		this.viajes[12].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[4].colorRedes+";"


		this.sobremi[0].color = this.$props.config[5].imagenPrincipal;
		this.sobremi[1].txtData = this.$props.config[5].textoPrincipal;
		this.sobremi[2].color = this.$props.config[5].textoNavbar;
		this.sobremi[2].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].textoNavbar+";"
		this.sobremi[3].color = this.$props.config[5].colorFooter;
		this.sobremi[3].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].colorFooter+";"
		this.sobremi[4].color = this.$props.config[5].textoFooter;
		this.sobremi[4].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].textoFooter+";"
		this.sobremi[5].color = this.$props.config[5].colorCuerpo;
		this.sobremi[5].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].colorCuerpo+";"
		this.sobremi[6].txtData = this.$props.config[5].textoCuerpo;
		this.sobremi[6].color = this.$props.config[5].imagenSecundaria;
		this.sobremi[6].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].imagenSecundaria+";"
		this.sobremi[8].color = this.$props.config[5].colorDiv;
		this.sobremi[8].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].colorDiv+";"
		this.sobremi[9].color = this.$props.config[5].colorNavM;
		this.sobremi[9].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].colorNavM+";"
		this.sobremi[10].color = this.$props.config[5].textoNavM;
		this.sobremi[10].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].textoNavM+";"
		this.sobremi[11].color = this.$props.config[5].colorBotonUp;
		this.sobremi[11].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].colorBotonUp+";"
		this.sobremi[12].color = this.$props.config[5].textoBotonUp;
		this.sobremi[12].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[5].textoBotonUp+";"


		this.contacto[0].color = this.$props.config[6].imagenPrincipal;
		this.contacto[1].txtData = this.$props.config[6].textoPrincipal;
		this.contacto[2].color = this.$props.config[6].textoNavbar;
		this.contacto[2].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].textoNavbar+";"
		this.contacto[3].color = this.$props.config[6].colorFooter;
		this.contacto[3].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].colorFooter+";"
		this.contacto[4].color = this.$props.config[6].textoFooter;
		this.contacto[4].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].textoFooter+";"
		this.contacto[5].color = this.$props.config[6].colorCuerpo;
		this.contacto[5].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].colorCuerpo+";"



		this.contacto[6].color = this.$props.config[6].textoCuerpo;
		this.contacto[6].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].textoCuerpo+";"


		this.contacto[7].color = this.$props.config[6].imagenSecundaria;


		this.contacto[8].color = this.$props.config[6].colorDiv;
		this.contacto[8].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].colorDiv+";"
		this.contacto[9].color = this.$props.config[6].colorNavM;
		this.contacto[9].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].colorNavM+";"
		this.contacto[10].color = this.$props.config[6].textoNavM;
		this.contacto[10].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].textoNavM+";"
		this.contacto[11].color = this.$props.config[6].colorBotonUp;
		this.contacto[11].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].colorBotonUp+";"
		this.contacto[12].color = this.$props.config[6].textoBotonUp;
		this.contacto[12].muestracolor = "width:30px;height:30px;border-width:1px;border-color:black;background-color:"+this.$props.config[6].textoBotonUp+";"



		this.$root.$emit('child-event');
	},
  };
</script>
