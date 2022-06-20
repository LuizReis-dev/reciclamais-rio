package entidades;

public class Bonificacao {
    private int id;
    private double valor;
    private Catador catador;

    public Bonificacao() {
    }

    public Bonificacao(double valor, Catador catador) {
        this.valor = valor;
        this.catador = catador;
    }

    public int getId() {
        return id;
    }

    public double getValor() {
        return valor;
    }

    public void setValor(double valor) {
        this.valor = valor;
    }

    public Catador getCatador() {
        return catador;
    }

    public void setCatador(Catador catador) {
        this.catador = catador;
    }
    
    
}
