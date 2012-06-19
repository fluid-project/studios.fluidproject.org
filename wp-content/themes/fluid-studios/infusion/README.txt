This vesion of MyInfusion was built from an unreleased version of Infusion
(35d490f8007947b92748ca9ebf790955eac71d82) using the following command:

Build the minified Infusion:
ant customBuild -Dinclude="uiOptions" -lib lib/rhino

Build the un-minified Infusion:
ant customBuild -Dinclude="uiOptions" -lib lib/rhino -DnoMinify="true"
