package entidades;

public class Material {
   
    private int id;
    private String nome;
    private double preco_por_kg;
    private double meta_bonificacao_kg;
    private double valor_bonificacao;

    public Material() {
    }

    public Material(String nome, double preco_por_kg, double meta_bonificacao_kg, double preco_bonificacao) {
        this.nome = nome;
        this.preco_por_kg = preco_por_kg;
        this.meta_bonificacao_kg = meta_bonificacao_kg;
        this.valor_bonificacao = preco_bonificacao;
    }

    public int getId() {
        return id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public double getPreco_por_kg() {
        return preco_por_kg;
    }

    public void setPreco_por_kg(double preco_por_kg) {
        this.preco_por_kg = preco_por_kg;
    }

    public double getMeta_bonificacao_kg() {
        return meta_bonificacao_kg;
    }

    public void setMeta_bonificacao_kg(double meta_bonificacao_kg) {
        this.meta_bonificacao_kg = meta_bonificacao_kg;
    }

    public double getPreco_bonificacao() {
        return valor_bonificacao;
    }

    public void setPreco_bonificacao(double preco_bonificacao) {
        this.valor_bonificacao = preco_bonificacao;
    }
    
    
}
