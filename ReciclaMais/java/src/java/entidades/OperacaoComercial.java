package entidades;

public class OperacaoComercial {

    private int id;
    private Catador catador;
    private Empresa empresa;
    private char tipo;
    private Material material;
    private double quantidade;
    private double total;

    public OperacaoComercial() {
    }

    public OperacaoComercial(Catador catador, char tipo, Material material, double quantidade, double total) {
        this.catador = catador;
        this.tipo = tipo;
        this.material = material;
        this.quantidade = quantidade;
        this.total = total;
    }

    public OperacaoComercial(Empresa empresa, char tipo, Material material, double quantidade, double total) {
        this.empresa = empresa;
        this.tipo = tipo;
        this.material = material;
        this.quantidade = quantidade;
        this.total = total;
    }

    public int getId() {
        return id;
    }

    public Catador getCatador() {
        return catador;
    }

    public void setCatador(Catador catador) {
        this.catador = catador;
    }

    public Empresa getEmpresa() {
        return empresa;
    }

    public void setEmpresa(Empresa empresa) {
        this.empresa = empresa;
    }

    public char getTipo() {
        return tipo;
    }

    public void setTipo(char tipo) {
        this.tipo = tipo;
    }

    public Material getMaterial() {
        return material;
    }

    public void setMaterial(Material material) {
        this.material = material;
    }

    public double getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(double quantidade) {
        this.quantidade = quantidade;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }
    
    
}

