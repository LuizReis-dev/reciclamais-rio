package entidades;

public class MateriaisEmOperacaoComercial {
    
    private int id;
    private OperacaoComercial operacaoComercial;
    private Material material;
    private double quantidadeEmKg;

    public MateriaisEmOperacaoComercial() {
    }

    public MateriaisEmOperacaoComercial(OperacaoComercial operacaoComercial, Material material, int quantidadeEmKg) {
        this.operacaoComercial = operacaoComercial;
        this.material = material;
        this.quantidadeEmKg = quantidadeEmKg;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public OperacaoComercial getOperacaoComercial() {
        return operacaoComercial;
    }

    public void setOperacaoComercial(OperacaoComercial operacaoComercial) {
        this.operacaoComercial = operacaoComercial;
    }

    public Material getMaterial() {
        return material;
    }

    public void setMaterial(Material material) {
        this.material = material;
    }

    public double getQuantidadeEmKg() {
        return quantidadeEmKg;
    }

    public void setQuantidadeEmKg(int quantidadeEmKg) {
        this.quantidadeEmKg = quantidadeEmKg;
    }
    
    
}
