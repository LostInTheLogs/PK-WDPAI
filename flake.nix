{
  inputs = {
    nixpkgs.url = "github:NixOS/nixpkgs/nixpkgs-unstable";
  };

  outputs = {nixpkgs, ...} @ inputs: let
    inherit (nixpkgs) lib;

    eachSystem = f:
      nixpkgs.lib.genAttrs nixpkgs.lib.systems.flakeExposed (
        system: f system nixpkgs.legacyPackages.${system}
      );
  in {
    packages = eachSystem (_system: pkgs: {});

    devShells = eachSystem (
      _system: pkgs: {
        default = pkgs.mkShell {
          buildInputs = [
            pkgs.php
          ];
        };
      }
    );
  };
}
