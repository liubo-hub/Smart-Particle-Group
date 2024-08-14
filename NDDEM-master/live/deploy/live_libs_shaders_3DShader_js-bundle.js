"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunknddem"] = self["webpackChunknddem"] || []).push([["live_libs_shaders_3DShader_js"],{

/***/ "./live/libs/shaders/3DShader.js":
/*!***************************************!*\
  !*** ./live/libs/shaders/3DShader.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   NDDEMShader: () => (/* binding */ NDDEMShader)\n/* harmony export */ });\n/* harmony import */ var three__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! three */ \"./node_modules/three/build/three.module.js\");\n\n\nvar N = 3;\nvar uniforms = {\n  N: { value: N },\n  // N_lines: { value: 5.0 },\n  //A: { value: new THREE.Matrix4() },\n  A: { value: [] }, // Size N*N\n  xview: { value: [] }, //Size N-3\n  xpart: { value: [] }, //Size N-3\n  // x4: { value: 0 },\n  // x4p: { value: 0 },\n  R: { value: 0.5 },\n  ambient: { value: 1.0 },\n  opacity: { value: 1.0 },\n};\n\nfor (var ij = 0; ij < N - 3; ij++) {\n  uniforms.xview.value[ij] = 0.0;\n  uniforms.xpart.value[ij] = 0.0;\n}\nif (N > 3) {\n  uniforms.x4.value = 0.0;\n}\nfor (var ij = 0; ij < N * N; ij++) {\n  if (ij % N == Math.floor(ij / N)) uniforms.A.value[ij] = 1;\n  else uniforms.A.value[ij] = 0;\n}\n\nvar NDDEMShader = new three__WEBPACK_IMPORTED_MODULE_0__.ShaderMaterial({\n  uniforms: uniforms,\n  // lights: true,\n\n  vertexShader: [\n    \"uniform int N;\", // number of dimensions in simulation\n    \"uniform float N_lines;\", // number of lines to render across particle\n    \"uniform float A[3*3];\", // orientation matrix for this particle\n    \"uniform float R;\", // particle radius\n\n    \"varying vec3 vColor;\", // colour at vertex (output)\n    \"varying vec3 vNormal;\", // normal at vertex (output)\n\n    //\"bool isnan( float val ) { return ( val < 0.0 || 0.0 < val || val == 0.0 ) ? false : true; }\",\n\n    \"void main() {\",\n    \"vNormal = normal;\", // for directional lighting\n    \"const float pi = 3.14159265359;\",\n    \"float R_draw;\", // radius particle will be drawn at\n    // \"float R_draw_squared = pow(R,2.0) ;\",\n    // \"if ( R_draw_squared > 0.0 ) {\", // only if visible\n    // \"R_draw = sqrt(R_draw_squared);\",\n    \"vec4 x;\",\n    \"vec4 x_rotated;\",\n    // \"float phi2;\",\n    // get 3d locations in x,y,z,w in coord system where center of sphere is at 0,0,0,0\n    \"x.y = R*cos((uv.y-0.5)*pi)*cos((uv.x-0.5)*2.0*pi);\",\n    \"x.z = - R*cos((uv.y-0.5)*pi)*sin((uv.x-0.5)*2.0*pi);\",\n    \"x.x = - R*sin((uv.y-0.5)*pi);\",\n    //x.w = x4 - x4p;\n\n    // compute the rotated location by doing transpose(A) * x, with A the orientation matrix from the dumps\n    \"x_rotated.x = A[0]*x.x + A[3]*x.y + A[6]*x.z ;\",\n    \"x_rotated.y = A[1]*x.x + A[4]*x.y + A[7]*x.z ;\",\n    \"x_rotated.z = A[2]*x.x + A[5]*x.y + A[8]*x.z ;\",\n    \"x_rotated.w=0. ;\",\n\n    // convert that new vector in hyperspherical coordinates (you can have a look at the hyperspherical_xtophi function in Tools.h)\n    // \"float rsqr = pow(length(x_rotated),2.0);\",\n    // \"float phi0 = acos(x_rotated.x/sqrt(rsqr));\",\n    // \"rsqr = rsqr - x_rotated.x*x_rotated.x;\",\n    // \"float phi1 = acos(x_rotated.y/sqrt(rsqr));\",\n    // \"rsqr = rsqr - x_rotated.y*x_rotated.y;\",\n    // \"if ( x_rotated.w == 0.0 ) {\",\n    // \"if ( x_rotated.z < 0.0 ) { phi2 = pi; }\",\n    // \"else if ( x_rotated.z == 0.0 ) {\",\n    // \"phi1 = 0.0;\",\n    // \"phi2 = 0.0;\",\n    // \"}\",\n    // \"else { phi2 = 0.0; }\",\n    // \"}\",\n    // \"else {\",\n    // \"phi2 = acos(x_rotated.z/sqrt(rsqr));\",\n    // \"}\",\n\n    // BENJY VERSION JUST FOR 3D --- removes annoying flickering from nans i couldnt get rid of\n    \"float phi0 = acos(x_rotated.x/R);\",\n    \"float phi1;\",\n    \"if ( x_rotated.z > 0. ) { phi1 = atan(x_rotated.y/x_rotated.z); }\",\n    \"else if ( x_rotated.z < 0. ) { phi1 = atan(x_rotated.y/x_rotated.z) + 3.14159265359; }\",\n    \"else { phi1 = 1.57079632679; }\",\n\n    // \"if ( isnan(phi0) ) { phi0 = acos(sign(x_rotated.x)*x_rotated.x); }\", // added by benjy, total guess\n    // \"if ( isnan(phi1) ) { phi1 = acos(sign(x_rotated.y)*x_rotated.y); }\",\n    // \"if ( x_rotated.w < 0.0 ) { phi2 = 2.0*pi - phi2; }\",\n\n    \"vColor.r = abs(sin(phi0*3.0));\",\n    \"vColor.g = abs(sin(phi1*2.0));\",\n    \"vColor = vColor * abs(sin(phi0));\",\n    // \"}\",\n    // \"else { vColor.r = 0.0; }\",\n    \"gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );\",\n\n    \"}\",\n  ].join(\"\\n\"),\n\n  fragmentShader: [\n    \"uniform float ambient;\", // brightness of particle\n    \"uniform float opacity;\", // opacity of particle\n\n    \"varying vec3 vNormal;\",\n    \"varying vec3 vColor;\",\n\n    \"void main() {\",\n\n    // add directional lighting\n    \"vec3 light = vec3( 0, 0, -1 );\", // bit of trial and error here\n    \"light = normalize( light );\",\n    \"float directional = max( dot( vNormal, light ), 0.0 );\",\n    \"gl_FragColor = vec4( 0.6*( ambient + directional ) * vColor, opacity );\", // colours by vertex colour\n\n    // no directional lighting\n    // \"const float ambient = 1.0;\",\n    // \"gl_FragColor = vec4( ( ambient ) * vColor, 1.0 );\", // colours by vertex colour\n\n    \"}\",\n  ].join(\"\\n\"),\n});\n\n\n\n\n//# sourceURL=webpack://nddem/./live/libs/shaders/3DShader.js?");

/***/ })

}]);